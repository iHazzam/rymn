<?php

namespace App\Http\Controllers;

use App\Instruments_Repaired;
use App\Instruments_Taught;
use App\Repairer;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
class learnController extends Controller
{
    //
    public function instruments()
    {
        return view('learn.instruments');
    }
    public function teacherdb()
    {
        $rows = DB::getSchemaBuilder()->getColumnListing('instruments_taught');
        unset($rows[0]); $rows[1] = ""; //remove the first two columns (the headers)
        array_pop($rows); array_pop($rows); //remove the timestamps
        $values =  $rows; //save the values without the spaces removed to make them postable
        $rows = str_replace('_',' ',$rows); //replace all underscores with spaces
        $teachers = Teacher::all();
        return view('learn.teacherdb', ['rows' => $rows, 'values' => $values,'teachers' => $teachers,]);
    }
    public function teachers()
    {
        return view('learn.teachers');
}
public function kids()
{
    return view('learn.kids');
}
    public function newInfo()
    {
        return redirect('/learn');
    }
    public function search(Request $request)
    {
        $rows = DB::getSchemaBuilder()->getColumnListing('instruments_taught');
        unset($rows[0]); $rows[1] = ""; //remove the first two columns (the headers)
        array_pop($rows); array_pop($rows); //remove the timestamps
        $values=  $rows; //save the values without the spaces removed to make them postable
        $rows = str_replace('_',' ',$rows); //replace all underscores with spaces
        $reqAll = $request->all();
        unset($reqAll["_token"]); //remove csrf token
        $reqArray = [];
        if((($request->has('instrument')))&&($request->has('subject')))
        {
            $request->session()->flash('alert-danger',"Error! Please don't select both an instrument, and a subject.");
            return Redirect::back();
        }
        
        if($request->has('age'))
        {
          $age = $reqAll['age'];
          $teacher = DB::table('teachers')->where('min_age_taught', '<=', $age)->where('max_age_taught', '>=', $age)->get();
            $reqArray[] = $teacher;
        }
        if($request->has('instrument'))
        {
            $instrument = $reqAll['instrument'];
            $teacher = DB::table('teachers')->join('instruments_taught','teachers.id','=','instruments_taught.teacher_id')->select('teachers.*')->where('instruments_taught.'.$instrument,'=','1')->get();
            $reqArray[] = $teacher;
        }
        if($request->has('location'))
        {
            $location = $reqAll['location'];
            $teacher = DB::table('teachers')->where($location, '=' , '1')->get();
            $reqArray[] = $teacher;
        }
        if(($request->has('subject')))
        {
            $subject = $reqAll['subject'];
            $teacher = DB::table('teachers')->where('teach_'.$subject, '=' , '1')->get();
            $reqArray[] = $teacher;
        }

        if($request->has('name'))
        {
            $name = $reqAll['name'];
            if(strpos($name, ' '))//if contains a space
            {
                $pieces = explode(" ", $name);//explode around space
                $teacher = DB::table('teachers')->where('last_name', 'LIKE' , $pieces[0])->orwhere('first_name','LIKE',$pieces[1])->orwhere('last_name', 'LIKE' , $pieces[1])->orwhere('first_name','LIKE',$pieces[0])->get();
            }
            else{
                $teacher = DB::table('teachers')->where('last_name', 'LIKE' , $name)->orwhere('first_name','LIKE',$name)->get();
            }
            $reqArray = [];//clear
            $reqArray[] = $teacher;
        }
        if($request->has('town'))
        {
            $town = $reqAll['town'];
            $teacher = DB::table('teachers')->where('city', 'LIKE' , $town)->get();
            $reqArray = [];//clear
            $reqArray[] = $teacher;
        }

        $ids = $this->restrictValues($reqArray);

        $teachers = [];
        if(count($ids) > 1)
        {
            $ids_final = call_user_func_array('array_intersect', $ids);
            foreach($ids_final as $id)
            {
                $teachers[] = DB::table('teachers')->where('id', '=', $id)->get();
            }
        }
        elseif($ids != null) {
            foreach ($ids[0] as $id) {
                $teachers[] = DB::table('teachers')->where('id', '=', $id)->get();
            }
        }
        else{
            $request->session()->flash('alert-danger',"No results found for this search! Please try again!");
            return Redirect::back();
        }




        return view('learn.teacherdb', ['rows' => $rows,'values' => $values,'teachers' => $teachers,]);
    }
    function restrictValues($array)
    {
        $array_keys = [];
        foreach ($array as $key => $tier2)
        {
            foreach($tier2 as $key2 => $tier3)
            {
                $array_keys[$key][$key2] = $tier3->id;
            }
        }
        return $array_keys;
    }
    function arrayFlatten($array)
    {
            $return = array();
            array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
            return $return;
    }
    public function accompanists()
    {
        $accompanists = Teacher::where('is_accompanist', '=', '1')->orderBy('last_name','asc')->get();
        $acc = [];
        foreach($accompanists as $a)
        {
            $acc_temp['id'] = $a->id;
            $acc_temp['name'] = $a->first_name . ' ' . $a->last_name;
            $level = $a->level_accompanied;
            if($level != 'diploma'|'concert_soloist')
            {
                $level = str_replace('grade','grade ',$level);
            }
            else if($level == 'concert_soloist' )
            {
                $level = 'concert soloist';
            }
            $level = ucfirst($level);
            $acc_temp['level'] = $level;
            $acc[] = $acc_temp;
        }
        return view('learn.accompanists', ['accomp' => $acc]);
    }
    public function repaired()
    {
        $repairers = Repairer::all();
        $rep = [];

        foreach($repairers as $a)
        {

            $repairer_temp['id'] = $a->id;
            $repairer_temp['name'] = $a->first_name . ' ' . $a->last_name;
            $instruments = Instruments_Repaired::whereRepairer_id($a->id)->get();
            $instruments = $instruments->toArray();
            $instruments = $instruments[0];
            array_shift($instruments);
            array_shift($instruments);//get rid of first 2
            $repairer_temp['repaired'] = "";
            foreach($instruments as $k => $i)
            {
                if($i == 1){
                    $k = str_replace('_',' ',$k);
                    $k = ucwords($k);
                    $repairer_temp['repaired'] = $repairer_temp['repaired'] . $k . ", ";
                }
            }
            $repairer_temp['repaired'] = rtrim( $repairer_temp['repaired'], ", ");
            $rep[] = $repairer_temp;
        }
        return view('learn.maintainance', ['repair' => $rep]);
    }

    public function registerRepairer()
    {
        return view ('learn/repairers');
    }
    public function newRepairer(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'addr1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'email' => 'required'
        ]);
        $error = false;
        if($request->password != $request->password2)
        {
            $errormessage = "Passwords do not match!";
            $request->session()->flash('alert-danger',$errormessage);
            return redirect()->back()->withInput(Input::all())->withErrors($errormessage);
        }
        $repairer = new Repairer();
        $repairer_instruments = new Instruments_Repaired();

        $repairer->first_name = $request->firstname;
        $repairer->last_name = $request->lastname;
        $repairer->address_line1 = $request->addr1;
        if($request->has('facebook'))
        {
            $repairer->facebook  = $request->facebook;
        }
        if($request->has('website'))
        {
            $repairer->website = $request->website;
        }
        if($request->has('addr2'))
        {
            $repairer->address_line2 = $request->addr2;
        }
        else{
            $repairer->address_line2 = "";
        }
        $repairer->city = $request->city;
        if (!$this->is_valid_postcode($request->postcode))
        {
            $errormessage = "invalid postcode entered on page 1 of form";
            $error = true;
        }
        else
        {
            $repairer->postcode = $request->postcode;
        }
        $repairer->email = $request->email;

        if($request->has('mobile'))
        {
            $checkMob = $this->checkUKTelephone($request->phone);
            if($checkMob)
            {
                $repairer->mobile = $request->mobile;
            }
            else{
                $errormessage = "Invalid mobile number entered on page 2 of form";
                $error = true;
            }
        }
        else{
            $repairer->mobile = "";
        }
        if($request->has('phone'))
        {
            $checkPhon = $this->checkUKTelephone($request->phone);
            if($checkPhon)
            {
                $repairer->phone = $request->phone;
            }
            else{
                $errormessage = "Invalid phone number entered on page 2 of form";
                $error = true;
            }
        }
        else{
            $repairer->phone = "";
        }

        if($request->has('biography'))
        {
            $repairer->biography = $request->biography;
        }
        else{
            $request->biography = "";
        }
//remove teach_accompanying
//Remove acompanying level
        if($request->has('Violin'))
        {
            $repairer_instruments->Violin = 1;
        }
        else{
            $repairer_instruments->Violin=0;
        }

        if($request->has('Viola'))
        {
            $repairer_instruments->Viola = 1;
        }
        else{
            $repairer_instruments->Viola=0;
        }

        if($request->has('Cello'))
        {
            $repairer_instruments->Cello = 1;
        }else{
            $repairer_instruments->Cello=0;
        }

        if($request->has('Double_Bass'))
        {
            $repairer_instruments->Double_Bass = 1;
        }else{
            $repairer_instruments->Double_Bass=0;
        }

        if($request->has('Harp'))
        {
            $repairer_instruments->Harp = 1;
        }else{
            $repairer_instruments->Harp =0;
        }

        if($request->has('Classical_Guitar'))
        {
            $repairer_instruments->guitar = 1;
        }else{
            $repairer_instruments->guitar=0;
        }

        if($request->has('Electric_Guitar'))
        {
            $repairer_instruments->Electric_Guitar = 1;
        }else{
            $repairer_instruments->Electric_Guitar=0;
        }

        if($request->has('Bass_Guitar'))
        {
            $repairer_instruments->Bass_Guitar = 1;
        }else{
            $repairer_instruments->Bass_Guitar=0;
        }

        if($request->has('Banjo'))
        {
            $repairer_instruments->Banjo = 1;
        }else{
            $repairer_instruments->Banjo =0;
        }

        if($request->has('Ukelele'))
        {
            $repairer_instruments->Ukelele = 1;
        }else{
            $repairer_instruments->Ukelele =0;
        }

        if($request->has('Sitar'))
        {
            $repairer_instruments->Sitar = 1;
        }else{
            $repairer_instruments->Sitar =0;
        }

        if($request->has('Balalaika'))
        {
            $repairer_instruments->Balalaika = 1;
        }else{
            $repairer_instruments->Balalaika =0;
        }

        if($request->has('Mandolin'))
        {
            $repairer_instruments->Mandolin = 1;
        }else{
            $repairer_instruments->Mandolin =0;
        }

        if($request->has('Zither'))
        {
            $repairer_instruments->Zither = 1;
        }else{
            $repairer_instruments->Zither =0;
        }

        if($request->has('Flute'))
        {
            $repairer_instruments->Flute = 1;
        }else{
            $repairer_instruments->Flute =0;
        }

        if($request->has('Clarinet'))
        {
            $repairer_instruments->Clarinet = 1;
        }else{
            $repairer_instruments->Clarinet =0;
        }

        if($request->has('Oboe'))
        {
            $repairer_instruments->Oboe = 1;
        }else{
            $repairer_instruments->Oboe =0;
        }

        if($request->has('Bassoon'))
        {
            $repairer_instruments->Bassoon = 1;
        }else{
            $repairer_instruments->Bassoon =0;
        }

        if($request->has('Recorder'))
        {
            $repairer_instruments->Recorder = 1;
        }else{
            $repairer_instruments->Recorder =0;
        }

        if($request->has('Piccolo'))
        {
            $repairer_instruments->Piccolo = 1;
        }else{
            $repairer_instruments->Piccolo =0;
        }

        if($request->has('Saxophone'))
        {
            $repairer_instruments->Saxophone = 1;
        }else{
            $repairer_instruments->Saxophone =0;
        }

        if($request->has('Cor_Anglais'))
        {
            $repairer_instruments->Cor_Anglais = 1;
        }else{
            $repairer_instruments->Cor_Anglais =0;
        }

        if($request->has('Basset_Horn'))
        {
            $repairer_instruments->Basset_Horn = 1;
        }else{
            $repairer_instruments->Basset_Horn=0;
        }

        if($request->has('Bass_Clarinet'))
        {
            $repairer_instruments->Bass_Clarinet = 1;
        }else{
            $repairer_instruments->Bass_Clarinet =0;
        }

        if($request->has('Contra_Bassoon'))
        {
            $repairer_instruments->Contra_Bassoon = 1;
        }else{
            $repairer_instruments->Contra_Bassoon =0;
        }

        if($request->has('Bagpipes'))
        {
            $repairer_instruments->Bagpipes = 1;
        }else{
            $repairer_instruments->Bagpipes =0;
        }

        if($request->has('Ocarina'))
        {
            $repairer_instruments->Ocarina = 1;
        }else{
            $repairer_instruments->Ocarina=0;
        }

        if($request->has('Mouth_Organ'))
        {
            $repairer_instruments->Mouth_Organ = 1;
        }else{
            $repairer_instruments->Mouth_Organ=0;
        }

        if($request->has('Horn'))
        {
            $repairer_instruments->French_Horn = 1;
        }else{
            $repairer_instruments->French_Horn=0;
        }

        if($request->has('Trumpet'))
        {
            $repairer_instruments->Trumpet = 1;
        }else{
            $repairer_instruments->Trumpet=0;
        }

        if($request->has('Trombone'))
        {
            $repairer_instruments->Trombone = 1;
        }else{
            $repairer_instruments->Trombone=0;
        }

        if($request->has('Tuba'))
        {
            $repairer_instruments->Tuba = 1;
        }else{
            $repairer_instruments->Tuba=0;
        }

        if($request->has('Cornet'))
        {
            $repairer_instruments->Cornet = 1;
        }else{
            $repairer_instruments->Cornet=0;
        }

        if($request->has('Flugel_Horn'))
        {
            $repairer_instruments->Flugel_Horn = 1;
        }else{
            $repairer_instruments->Flugel_Horn=0;
        }

        if($request->has('Tenor_Horn'))
        {
            $repairer_instruments->Tenor_Horn = 1;
        }else{
            $repairer_instruments->Tenor_Horn=0;
        }

        if($request->has('Baritone'))
        {
            $repairer_instruments->Baritone = 1;
        }else{
            $repairer_instruments->Baritone=0;
        }

        if($request->has('Euphonium'))
        {
            $repairer_instruments->Euphonium = 1;
        }else{
            $repairer_instruments->Euphonium=0;
        }

        if($request->has('Ophicleide'))
        {
            $repairer_instruments->Ophicleide = 1;
        }else{
            $repairer_instruments->Ophicleide=0;
        }

        if($request->has('Sackbutt'))
        {
            $repairer_instruments->Sackbutt = 1;
        }else{
            $repairer_instruments->Sackbutt=0;
        }

        if($request->has('Cornette'))
        {
            $repairer_instruments->Cornette = 1;
        }else{
            $repairer_instruments->Cornette =0;
        }

        if($request->has('Serpent'))
        {
            $repairer_instruments->Serpent = 1;
        }else{
            $repairer_instruments->Serpent=0;
        }

        if($request->has('Digeridoo'))
        {
            $repairer_instruments->Digeridoo = 1;
        }else{
            $repairer_instruments->Digeridoo =0;
        }
        if($request->has('Timpani'))
        {
            $repairer_instruments->Timpani = 1;
        }else{
            $repairer_instruments->Timpani=0;
        }

        if($request->has('Orchestral_Percussion'))
        {
            $repairer_instruments->Orchestral_Percussion = 1;
        }else{
            $repairer_instruments->Orchestral_Percussion=0;
        }
        if($request->has('Tuned_Percussion'))
        {
            $repairer_instruments->Tuned_Percussion = 1;
        }else{
            $repairer_instruments->Tuned_Percussion=0;
        }

        if($request->has('Drum_Kit'))
        {
            $repairer_instruments->Drum_Kit = 1;
        }else{
            $repairer_instruments->Drum_Kit=0;
        }
        if($request->has('xylophone'))
        {
            $repairer_instruments->xylophone = 1;
        }else{
            $repairer_instruments->xylophone=0;
        }

        if($request->has('Marimba'))
        {
            $repairer_instruments->Marimba = 1;
        }else{
            $repairer_instruments->Marimba=0;
        }
        if($request->has('Vibraphone'))
        {
            $repairer_instruments->Vibraphone = 1;
        }else{
            $repairer_instruments->Vibraphone=0;
        }

        if($request->has('Glockenspiel'))
        {
            $repairer_instruments->Glockenspiel = 1;
        }else{
            $repairer_instruments->Glockenspiel=0;
        }
        if($request->has('Cembalom'))
        {
            $repairer_instruments->Cembalom = 1;
        }else{
            $repairer_instruments->Cembalom=0;
        }

        if($request->has('Piano'))
        {
            $repairer_instruments->Piano = 1;
        }else{
            $repairer_instruments->Piano=0;
        }
        if($request->has('Organ'))
        {
            $repairer_instruments->Organ = 1;
        }else{
            $repairer_instruments->Organ=0;
        }

        if($request->has('Keyboard'))
        {
            $repairer_instruments->Keyboard = 1;
        }else{
            $repairer_instruments->Keyboard=0;
        }
        if($request->has('Harpsichord'))
        {
            $repairer_instruments->Harpsichord = 1;
        }else{
            $repairer_instruments->Harpsichord=0;
        }
        if($request->hasFile('thumbnail_image'))
        {
            if ($request->file('thumbnail_image')->isValid()) {
                $destPath = 'upload';
                $extension = $request->file('thumbnail_image')->getClientOriginalExtension();

                if ($extension == 'png' || 'gif' || 'jpg' || 'jpeg') {
                    $filename = rand(11111, 99999) . '.' . $extension;
                    $request->file('thumbnail_image')->move($destPath, $filename);
                    $repairer->thumbnail_img = $destPath . "/" . $filename;
                } else {
                    $error = true;
                    $errormessage = 'Error: Incorrect filetype uploaded (Must be png, gif, jpg, or jpeg)';
                }
            }
            else{
                $error = true;
                $errormessage = 'Error: Added file not valid)';
            }

        }

        if($error == false)
        {
            try{
                $input['email'] = $request->email;
                $rules = array('email' => 'unique:users,email');
                $validator = Validator::make($input, $rules);
                if ($validator->fails()) {
                    $user = User::where('email', '=', $request->email)->first();
                    $user->is_repairer = true;
                    $user->save();
                }
                else
                {
                    $user = new User;
                    $user->name = $request->firstname . " " . $request->lastname;
                    $user->email = $request->email;
                    $user->password =  bcrypt($request->password);
                    $user->is_repairer = true;
                }
                $user->save();
                $repairer->user_id = $user->id;
                $repairer->save();
                $repairer_instruments->repairer_id = $repairer->id;
                $repairer_instruments->save();
                $request->session()->flash('alert-success', "Thanks! Repairer registration complete!");
                return redirect()->back();
            }
            catch(QueryException $e){
                $errormessage = "This Email Address may already be registered. Please try logging in";
                $request->session()->flash('alert-danger',$errormessage);
                return redirect()->back()->withInput(Input::all())->withErrors($errormessage);
            }

        }
        else{
            $request->session()->flash('alert-danger',$errormessage);
            return redirect()->back()->withInput(Input::all())->withErrors($errormessage);
        }
    }
    public function editRepairer(Request $request)
    {
        $error = false;
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'addr1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'email' => 'required'
        ]);
        $repairer = Repairer::whereUser_id(Auth::user()->id)->first();

        $repairer_instruments = Instruments_Repaired::find($repairer->id);
        $repairer->first_name = $request->firstname;
        $repairer->last_name = $request->lastname;
        $repairer->address_line1 = $request->addr1;
        if($request->has('facebook'))
        {
            $repairer->facebook  = $request->facebook;
        }
        else{
            $repairer->facebook = "";
        }
        if($request->has('website'))
        {
            $repairer->website = $request->website;
        }
        else{
            $repairer->website = "";
        }
        if($request->has('addr2'))
        {
            $repairer->address_line2 = $request->addr2;
        }
        $repairer->city = $request->city;
        if (!$this->is_valid_postcode($request->postcode))
        {
            $errormessage = "invalid postcode entered on page 1 of form";
            $error = true;
        }
        else
        {
            $repairer->postcode = $request->postcode;
        }
        $repairer->email = $request->email;

        if($request->has('mobile'))
        {
            $checkMob = $this->checkUKTelephone($request->phone);
            if($checkMob)
            {
                $repairer->mobile = $request->mobile;
            }
            else{
                $errormessage = "Invalid mobile number entered on page 2 of form";
                $error = true;
            }
        }
        if($request->has('phone'))
        {
            $checkPhon = $this->checkUKTelephone($request->phone);
            if($checkPhon)
            {
                $repairer->phone = $request->phone;
            }
            else{
                $errormessage = "Invalid phone number entered on page 2 of form";
                $error = true;
            }
        }

        if($request->has('biography'))
        {
            $repairer->biography = $request->biography;
        }
//remove teach_accompanying
//Remove acompanying level
        if($request->has('Violin'))
        {
            $repairer_instruments->Violin = 1;
        }

        if($request->has('Viola'))
        {
            $repairer_instruments->Viola = 1;
        }

        if($request->has('Cello'))
        {
            $repairer_instruments->Cello = 1;
        }

        if($request->has('Double_Bass'))
        {
            $repairer_instruments->Double_Bass = 1;
        }

        if($request->has('Harp'))
        {
            $repairer_instruments->Harp = 1;
        }

        if($request->has('Classical_Guitar'))
        {
            $repairer_instruments->guitar = 1;
        }

        if($request->has('Electric_Guitar'))
        {
            $repairer_instruments->Electric_Guitar = 1;
        }

        if($request->has('Bass_Guitar'))
        {
            $repairer_instruments->Bass_Guitar = 1;
        }

        if($request->has('Banjo'))
        {
            $repairer_instruments->Banjo = 1;
        }

        if($request->has('Ukelele'))
        {
            $repairer_instruments->Ukelele = 1;
        }

        if($request->has('Sitar'))
        {
            $repairer_instruments->Sitar = 1;
        }

        if($request->has('Balalaika'))
        {
            $repairer_instruments->Balalaika = 1;
        }

        if($request->has('Mandolin'))
        {
            $repairer_instruments->Mandolin = 1;
        }

        if($request->has('Zither'))
        {
            $repairer_instruments->Zither = 1;
        }

        if($request->has('Flute'))
        {
            $repairer_instruments->Flute = 1;
        }

        if($request->has('Clarinet'))
        {
            $repairer_instruments->Clarinet = 1;
        }

        if($request->has('Oboe'))
        {
            $repairer_instruments->Oboe = 1;
        }

        if($request->has('Bassoon'))
        {
            $repairer_instruments->Bassoon = 1;
        }

        if($request->has('Recorder'))
        {
            $repairer_instruments->Recorder = 1;
        }

        if($request->has('Piccolo'))
        {
            $repairer_instruments->Piccolo = 1;
        }

        if($request->has('Saxophone'))
        {
            $repairer_instruments->Saxophone = 1;
        }

        if($request->has('Cor_Anglais'))
        {
            $repairer_instruments->Cor_Anglais = 1;
        }

        if($request->has('Basset_Horn'))
        {
            $repairer_instruments->Basset_Horn = 1;
        }

        if($request->has('Bass_Clarinet'))
        {
            $repairer_instruments->Bass_Clarinet = 1;
        }

        if($request->has('Contra_Bassoon'))
        {
            $repairer_instruments->Contra_Bassoon = 1;
        }

        if($request->has('Bagpipes'))
        {
            $repairer_instruments->Bagpipes = 1;
        }

        if($request->has('Ocarina'))
        {
            $repairer_instruments->Ocarina = 1;
        }

        if($request->has('Mouth_Organ'))
        {
            $repairer_instruments->Mouth_Organ = 1;
        }

        if($request->has('Horn'))
        {
            $repairer_instruments->French_Horn = 1;
        }

        if($request->has('Trumpet'))
        {
            $repairer_instruments->Trumpet = 1;
        }

        if($request->has('Trombone'))
        {
            $repairer_instruments->Trombone = 1;
        }

        if($request->has('Tuba'))
        {
            $repairer_instruments->Tuba = 1;
        }

        if($request->has('Cornet'))
        {
            $repairer_instruments->Cornet = 1;
        }

        if($request->has('Flugel_Horn'))
        {
            $repairer_instruments->Flugel_Horn = 1;
        }

        if($request->has('Tenor_Horn'))
        {
            $repairer_instruments->Tenor_Horn = 1;
        }

        if($request->has('Baritone'))
        {
            $repairer_instruments->Baritone = 1;
        }

        if($request->has('Euphonium'))
        {
            $repairer_instruments->Euphonium = 1;
        }

        if($request->has('Ophicleide'))
        {
            $repairer_instruments->Ophicleide = 1;
        }

        if($request->has('Sackbutt'))
        {
            $repairer_instruments->Sackbutt = 1;
        }

        if($request->has('Cornette'))
        {
            $repairer_instruments->Cornette = 1;
        }

        if($request->has('Serpent'))
        {
            $repairer_instruments->Serpent = 1;
        }

        if($request->has('Digeridoo'))
        {
            $repairer_instruments->Digeridoo = 1;
        }
        if($request->has('Timpani'))
        {
            $repairer_instruments->Timpani = 1;
        }

        if($request->has('Orchestral_Percussion'))
        {
            $repairer_instruments->Orchestral_Percussion = 1;
        }
        if($request->has('Tuned_Percussion'))
        {
            $repairer_instruments->Tuned_Percussion = 1;
        }

        if($request->has('Drum_Kit'))
        {
            $repairer_instruments->Drum_Kit = 1;
        }
        if($request->has('xylophone'))
        {
            $repairer_instruments->xylophone = 1;
        }

        if($request->has('Marimba'))
        {
            $repairer_instruments->Marimba = 1;
        }
        if($request->has('Vibraphone'))
        {
            $repairer_instruments->Vibraphone = 1;
        }

        if($request->has('Glockenspiel'))
        {
            $repairer_instruments->Glockenspiel = 1;
        }
        if($request->has('Cembalom'))
        {
            $repairer_instruments->Cembalom = 1;
        }

        if($request->has('Piano'))
        {
            $repairer_instruments->Piano = 1;
        }
        if($request->has('Organ'))
        {
            $repairer_instruments->Organ = 1;
        }

        if($request->has('Keyboard'))
        {
            $repairer_instruments->Keyboard = 1;
        }
        if($request->has('Harpsichord'))
        {
            $repairer_instruments->Harpsichord = 1;
        }

        if($request->hasFile('thumbnail_image'))
        {
            if ($request->file('thumbnail_image')->isValid()) {
                $destPath = 'upload';
                $extension = $request->file('thumbnail_image')->getClientOriginalExtension();

                if ($extension == 'png' || 'gif' || 'jpg' || 'jpeg') {
                    $filename = rand(11111, 99999) . '.' . $extension;
                    $request->file('thumbnail_image')->move($destPath, $filename);
                    $repairer->thumbnail_img = $destPath . "/" . $filename;
                } else {
                    $error = true;
                    $errormessage = 'Error: Incorrect filetype uploaded (Must be png, gif, jpg, or jpeg)';
                }
            }
            else{
                $error = true;
                $errormessage = 'Error: Added file not valid)';
            }

        }

        if($error == false)
        {
            try{
                $input['email'] = $request->email;
                $rules = array('email' => 'unique:users,email');
                $validator = Validator::make($input, $rules);
                if ($validator->fails()) {
                    $user = User::where('email', '=', $request->email)->first();
                    $user->is_repairer = true;
                    $user->save();
                }
                else
                {
                    $user = new User;
                    $user->name = $request->firstname . " " . $request->lastname;
                    $user->email = $request->email;
                    $user->password =  bcrypt($request->password);
                    $user->is_repairer = true;
                }
                $user->save();
                $repairer->user_id = $user->id;
                $repairer->save();
                $repairer_instruments->repairer_id = $repairer->id;
                $repairer_instruments->save();
                $request->session()->flash('alert-success', "Thanks! Repairer editing completed!");
                return redirect()->back();
            }
            catch(QueryException $e){
                $errormessage = "This Email Address may already be registered. Please try logging in";
                $request->session()->flash('alert-danger',$errormessage);
                return redirect()->back()->withInput(Input::all())->withErrors($errormessage);
            }

        }
        else{
            $request->session()->flash('alert-danger',$errormessage);
            return redirect()->back()->withInput(Input::all())->withErrors($errormessage);
        }
    }
function is_valid_postcode($postcode) {
    $validation_expression = '/^(((([A-PR-UWYZ][0-9][0-9A-HJKS-UW]?)|([A-PR-UWYZ][A-HK-Y][0-9][0-9ABEHMNPRV-Y]?))\s{0,2}[0-9]([ABD-HJLNP-UW-Z]{2}))|(GIR\s{0,2}0AA))$/i';

    return preg_match($validation_expression, $postcode);
}
function checkUKTelephone ($strTelephoneNumber) {

    // Copy the parameter and strip out the spaces
    $strTelephoneNumberCopy = str_replace (' ', '', $strTelephoneNumber);

    // Convert into a string and check that we were provided with something
    if (empty($strTelephoneNumberCopy)) {
        $intError = 1;
        $strError = 'Telephone number not provided';
        return false;
    }

    // Don't allow country codes to be included (assumes a leading "+")
    if (preg_match('/^(\+)[\s]*(.*)$/',$strTelephoneNumberCopy)) {
        $intError = 2;
        $strError = 'UK telephone number without the country code, please';
        return false;
    }

    // Remove hyphens - they are not part of a telephone number
    $strTelephoneNumberCopy = str_replace ('-', '', $strTelephoneNumberCopy);

    // Now check that all the characters are digits
    if (!preg_match('/^[0-9]{10,11}$/',$strTelephoneNumberCopy)) {
        $intError = 3;
        $strError = 'UK telephone numbers should contain 10 or 11 digits';
        return false;
    }

    // Now check that the first digit is 0
    if (!preg_match('/^0[0-9]{9,10}$/',$strTelephoneNumberCopy)) {
        $intError = 4;
        $strError = 'The telephone number should start with a 0';
        return false;
    }

    // Check the string against the numbers allocated for dramas

    // Expression for numbers allocated to dramas

    $tnexp[0] =  '/^(0113|0114|0115|0116|0117|0118|0121|0131|0141|0151|0161)(4960)[0-9]{3}$/';
    $tnexp[1] =  '/^02079460[0-9]{3}$/';
    $tnexp[2] =  '/^01914980[0-9]{3}$/';
    $tnexp[3] =  '/^02890180[0-9]{3}$/';
    $tnexp[4] =  '/^02920180[0-9]{3}$/';
    $tnexp[5] =  '/^01632960[0-9]{3}$/';
    $tnexp[6] =  '/^07700900[0-9]{3}$/';
    $tnexp[7] =  '/^08081570[0-9]{3}$/';
    $tnexp[8] =  '/^09098790[0-9]{3}$/';
    $tnexp[9] =  '/^03069990[0-9]{3}$/';

    foreach ($tnexp as $regexp) {
        if (preg_match($regexp,$strTelephoneNumberCopy, $matches)) {
            $intError = 5;
            $strError = 'The telephone number is either invalid or inappropriate';
            return false;
        }
    }

    // Finally, check that the telephone number is appropriate.
    if (!preg_match('/^(01|02|03|05|070|071|072|073|074|075|07624|077|078|079)[0-9]+$/',$strTelephoneNumberCopy)) {
        $intError = 5;
        $strError = 'The telephone number is either invalid or inappropriate';
        return false;
    }

    // Seems to be valid - return the stripped telephone number
    $strTelephoneNumber = $strTelephoneNumberCopy;
    $intError = 0;
    $strError = '';
    return true;
}
function getTeacherContactDetails($id){
    $teach = Teacher::where('id','=',$id)->first();
    $teacher = [];
    $teacher['email'] = $teach->email;
    if($teach->phone !== null)
    {
        $teacher['phone'] = $teach->phone;
    }
    if($teach->mobile !== null)
    {
        $teacher['mobile'] = $teach->mobile;
    }
    return json_encode($teacher);

}
    function getRepairerContactDetails($id){
        $teach = Repairer::where('id','=',$id)->first();
        $teacher = [];
        $teacher['email'] = $teach->email;
        if($teach->phone !== null)
        {
            $teacher['phone'] = $teach->phone;
        }
        if($teach->mobile !== null)
        {
            $teacher['mobile'] = $teach->mobile;
        }
        if($teach->website !== null)
        {
            $teacher['website'] = $teach->website;
        }
        if($teach->facebook !== null)
        {
            $teacher['facebook'] = $teach->facebook;
        }

        return json_encode($teacher);

    }
public function exams(){
        return view('learn.exams');
    }
    public function purchase(){
        return view('learn.purchase');
    }
    public function practice(){
        return view('learn.practice');
    }
    public function parents(){
        return view('learn.parents');
    }
}
