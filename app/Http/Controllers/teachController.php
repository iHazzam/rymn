<?php

namespace App\Http\Controllers;

use App\Instruments_Taught;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests;

use Storage;

Use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


use App\Http\Controllers\Controller;

class teachController extends Controller
{
    //
    public function register()
    {
        return view('teach.register');
    }
    public function resources()
    {
        $files = [];
        $files['0-10'] = Storage::files('resources/0-10');
        $files['10-16'] = Storage::files('resources/10-16');
        $files['16+'] = Storage::files('resources/16+');

        return view('teach.resources')->with('files', $files);
    }
    public function newTeach(Request $request)
    {
        var_dump($request->all());
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'addr1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'email' => 'required',
            'instrument_1' => 'required',
            'instrument_1_select_min'=>'required',
            'instrument_1_select_max'=>'required',
            'Qualification' => 'required',
            'performing_experience' => 'required',
            'teaching_experience' => 'required',
        ]);
        $error = false;
        if($request->password != $request->password2)
        {
            $errormessage = "Passwords do not match!";
            $request->session()->flash('alert-danger',$errormessage);
            return redirect()->back()->withInput(Input::all())->withErrors($errormessage);
        }
        $teacher = new Teacher();
        $teacher_instruments = new Instruments_Taught();

        $teacher->first_name = $request->firstname;
        $teacher->last_name = $request->lastname;
        $teacher->address_line1 = $request->addr1;
        if($request->has('addr2'))
        {
            $teacher->address_line2 = $request->addr2;
        }
        $teacher->city = $request->city;
        if (!$this->is_valid_postcode($request->postcode))
        {
            $errormessage = "invalid postcode entered on page 1 of form";
            $error = true;
        }
        else
        {
            $teacher->postcode = $request->postcode;
        }
        $teacher->email = $request->email;

        if($request->has('mobile'))
        {
            $checkMob = $this->checkUKTelephone($request->phone);
            if($checkMob)
            {
                $teacher->mobile = $request->mobile;
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
                $teacher->phone = $request->phone;
            }
            else{
                $errormessage = "Invalid phone number entered on page 2 of form";
                $error = true;
            }
        }
        $teacher->instruments_played1 = $request->instrument_1;
        $teacher->level_min_instrument1 = $request->instrument_1_select_min;
        $teacher->level_max_instrument1 = $request->instrument_1_select_max;
        if($request->has('instrument_2'))
        {
            $teacher->instruments_played2 = $request->instrument_2;
            $teacher->level_min_instrument2 = $request->instrument_2_select_min;
            $teacher->level_max_instrument2 = $request->instrument_2_select_max;
        }
        if($request->has('instrument_3'))
        {
            $teacher->instruments_played3 = $request->instrument_3;
            $teacher->level_min_instrument3 = $request->instrument_3_select_min;
            $teacher->level_max_instrument3 = $request->instrument_3_select_max;
        }
        if($request->has('instrument_4'))
        {
            $teacher->instruments_played4 = $request->instrument_4;
            $teacher->level_min_instrument4 = $request->instrument_4_select_min;
            $teacher->level_max_instrument4 = $request->instrument_4_select_max;
        }
        $teacher->qualification = $request->Qualification;
        $teacher->performing_experience = $request->performing_experience;
        $teacher->teaching_experience = $request->teaching_experience;

        if($request->has('minage'))
        {
            $teacher->min_age_taught = $request->minage;
        }
        else
        {
            $teacher->min_age_taught = 0;
        }

        if($request->has('maxage'))
        {
            $teacher->max_age_taught = $request->maxage;
        }
        else
        {
            $teacher->max_age_taught = 999;
        }

        if($request->has('teach_at_pupil_home'))
        {
            $teacher->teach_at_pupil_home = 1;
        }

        if($request->has('teach_at_own_home'))
        {
            $teacher->teach_at_own_home = 1;
        }

        if($request->has('teach_online'))
        {
            $teacher->teach_online = 1;
        }
        if($request->has('teach_at_school'))
        {
            $teacher->teach_at_school = 1;
        }
        if($request->has('tmt_cb'))
        {
            $teacher->teach_theory = 1;
        }
        if($request->has('level_musictheory'))
        {
            $teacher->theory_level = $request->level_musictheory;
        }
        if($request->has('ta_cb'))
        {
            $teacher->teach_aural = 1;
        }
        if($request->has('level_aural'))
        {
            $teacher->aural_level = $request->level_aural;
        }
        if($request->has('tc_cb'))
        {
            $teacher->teach_composition = 1;
        }
        if($request->has('level_composition'))
        {
            $teacher->composition_level = $request->level_composition;
        }
        if($request->has('cb_acc'))
        {
            $teacher->is_accompanist = 1;
        }
        if($request->has('level_accompanied'))
        {
            $teacher->level_accompanied = $request->level_accompanied;
        }
        if($request->has('repair'))
        {
            $teacher->is_instrument_repairer = 1;
        }
        if($request->has('repair_instruments'))
        {
            $teacher->instruments_repaired = $request->repair_instruments;//add
        }
        if($request->has('crb'))
        {
            $teacher->crb_checked = 1;
        }
        if($request->has('biography'))
        {
            $teacher->biography = $request->biography;
        }
        //remove teach_accompanying
        //Remove acompanying level
        if($request->has('Violin'))
        {
            $teacher_instruments->Violin = 1;
        }

        if($request->has('Viola'))
        {
            $teacher_instruments->Viola = 1;
        }

        if($request->has('Cello'))
        {
            $teacher_instruments->Cello = 1;
        }

        if($request->has('Double_Bass'))
        {
            $teacher_instruments->Double_Bass = 1;
        }

        if($request->has('Harp'))
        {
            $teacher_instruments->Harp = 1;
        }

        if($request->has('Classical_Guitar'))
        {
            $teacher_instruments->guitar = 1;
        }

        if($request->has('Electric_Guitar'))
        {
            $teacher_instruments->Electric_Guitar = 1;
        }

        if($request->has('Bass_Guitar'))
        {
            $teacher_instruments->Bass_Guitar = 1;
        }

        if($request->has('Banjo'))
        {
            $teacher_instruments->Banjo = 1;
        }

        if($request->has('Ukelele'))
        {
            $teacher_instruments->Ukelele = 1;
        }

        if($request->has('Sitar'))
        {
            $teacher_instruments->Sitar = 1;
        }

        if($request->has('Balalaika'))
        {
            $teacher_instruments->Balalaika = 1;
        }

        if($request->has('Mandolin'))
        {
            $teacher_instruments->Mandolin = 1;
        }

        if($request->has('Zither'))
        {
            $teacher_instruments->Zither = 1;
        }

        if($request->has('Flute'))
        {
            $teacher_instruments->Flute = 1;
        }

        if($request->has('Clarinet'))
        {
            $teacher_instruments->Clarinet = 1;
        }

        if($request->has('Oboe'))
        {
            $teacher_instruments->Oboe = 1;
        }

        if($request->has('Bassoon'))
        {
            $teacher_instruments->Bassoon = 1;
        }

        if($request->has('Recorder'))
        {
            $teacher_instruments->Recorder = 1;
        }

        if($request->has('Piccolo'))
        {
            $teacher_instruments->Piccolo = 1;
        }

        if($request->has('Saxophone'))
        {
            $teacher_instruments->Saxophone = 1;
        }

        if($request->has('Cor_Anglais'))
        {
            $teacher_instruments->Cor_Anglais = 1;
        }

        if($request->has('Basset_Horn'))
        {
            $teacher_instruments->Basset_Horn = 1;
        }

        if($request->has('Bass_Clarinet'))
        {
            $teacher_instruments->Bass_Clarinet = 1;
        }

        if($request->has('Contra_Bassoon'))
        {
            $teacher_instruments->Contra_Bassoon = 1;
        }

        if($request->has('Bagpipes'))
        {
            $teacher_instruments->Bagpipes = 1;
        }

        if($request->has('Ocarina'))
        {
            $teacher_instruments->Ocarina = 1;
        }

        if($request->has('Mouth_Organ'))
        {
            $teacher_instruments->Mouth_Organ = 1;
        }

        if($request->has('Horn'))
        {
            $teacher_instruments->French_Horn = 1;
        }

        if($request->has('Trumpet'))
        {
            $teacher_instruments->Trumpet = 1;
        }

        if($request->has('Trombone'))
        {
            $teacher_instruments->Trombone = 1;
        }

        if($request->has('Tuba'))
        {
            $teacher_instruments->Tuba = 1;
        }

        if($request->has('Cornet'))
        {
            $teacher_instruments->Cornet = 1;
        }

        if($request->has('Flugel_Horn'))
        {
            $teacher_instruments->Flugel_Horn = 1;
        }

        if($request->has('Tenor_Horn'))
        {
            $teacher_instruments->Tenor_Horn = 1;
        }

        if($request->has('Baritone'))
        {
            $teacher_instruments->Baritone = 1;
        }

        if($request->has('Euphonium'))
        {
            $teacher_instruments->Euphonium = 1;
        }

        if($request->has('Ophicleide'))
        {
            $teacher_instruments->Ophicleide = 1;
        }

        if($request->has('Sackbutt'))
        {
            $teacher_instruments->Sackbutt = 1;
        }

        if($request->has('Cornette'))
        {
            $teacher_instruments->Cornette = 1;
        }

        if($request->has('Serpent'))
        {
            $teacher_instruments->Serpent = 1;
        }

        if($request->has('Digeridoo'))
        {
            $teacher_instruments->Digeridoo = 1;
        }
        if($request->has('Timpani'))
        {
            $teacher_instruments->Timpani = 1;
        }

        if($request->has('Orchestral_Percussion'))
        {
            $teacher_instruments->Orchestral_Percussion = 1;
        }
        if($request->has('Tuned_Percussion'))
        {
            $teacher_instruments->Tuned_Percussion = 1;
        }

        if($request->has('Drum_Kit'))
        {
            $teacher_instruments->Drum_Kit = 1;
        }
        if($request->has('xylophone'))
        {
            $teacher_instruments->xylophone = 1;
        }

        if($request->has('Marimba'))
        {
            $teacher_instruments->Marimba = 1;
        }
        if($request->has('Vibraphone'))
        {
            $teacher_instruments->Vibraphone = 1;
        }

        if($request->has('Glockenspiel'))
        {
            $teacher_instruments->Glockenspiel = 1;
        }
        if($request->has('Cembalom'))
        {
            $teacher_instruments->Cembalom = 1;
        }

        if($request->has('Piano'))
        {
            $teacher_instruments->Piano = 1;
        }
        if($request->has('Organ'))
        {
            $teacher_instruments->Organ = 1;
        }

        if($request->has('Keyboard'))
        {
            $teacher_instruments->Keyboard = 1;
        }
        if($request->has('Harpsichord'))
        {
            $teacher_instruments->Harpsichord = 1;
        }

        if($request->has('Male_Singing'))
        {
            $teacher_instruments->Male_Singing = 1;
        }
        if($request->has('Female_Singing'))
        {
            $teacher_instruments->Female_Singing = 1;
        }
        var_dump('arriving');
        if($request->hasFile('thumbnail_image'))
        {
            var_dump('has');
            if ($request->file('thumbnail_image')->isValid()) {
                    $destPath = 'upload';
                    $extension = $request->file('thumbnail_image')->getClientOriginalExtension();

                    if ($extension == 'png' || 'gif' || 'jpg' || 'jpeg') {
                        $filename = rand(11111, 99999) . '.' . $extension;
                        $request->file('thumbnail_image')->move($destPath, $filename);
                        $teacher->thumbnail_img = $destPath . "/" . $filename;
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
                    $user->is_teacher = true;
                    $user->save();
                }
                else
                {
                    $user = new User;
                    $user->name = $request->firstname . " " . $request->lastname;
                    $user->email = $request->email;
                    $user->password =  bcrypt($request->password);
                    $user->is_teacher = true;
                }
                $user->save();
                $teacher->user_id = $user->id;
                $teacher->save();
                $teacher_instruments->teacher_id = $teacher->id;
                $teacher_instruments->save();
                $request->session()->flash('alert-success', "Thanks! Teacher registration complete!");
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

}
