<?php

namespace App\Http\Controllers;

use App\Instruments_Taught;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $accompanists = Teacher::where('is_instrument_repairer', '=', '1')->orderBy('last_name','asc')->get();
        $acc = [];
        foreach($accompanists as $a)
        {
            $acc_temp['id'] = $a->id;
            $acc_temp['name'] = $a->first_name . ' ' . $a->last_name;
            $level = $a->instruments_repaired;
            $acc[] = $acc_temp;
        }
        return view('learn.maintainance', ['repair' => $acc]);
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
}
