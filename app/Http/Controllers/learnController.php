<?php

namespace App\Http\Controllers;

use App\Instruments_Taught;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use Illuminate\Http\Request;

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
        unset($rows[0]); $rows[1] = "-"; //remove the first two columns (the headers)
        array_pop($rows); array_pop($rows); //remove the timestamps
        $rows = str_replace('_',' ',$rows); //replace all underscores with spaces
        $teachers = Teacher::all();
        return view('learn.teacherdb', ['rows' => $rows,'teachers' => $teachers,]);
    }
    public function parents()
    {
        return view('learn.parents');
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
        $rows = str_replace('_',' ',$rows); //replace all underscores with spaces
        $reqAll = $request->all();
        unset($reqAll["_token"]); //remove csrf token
        var_dump($reqAll);
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
        if(($request->has('subject'))&&($request->has('level')))
        {
            $subject = $reqAll['subject'];
            $level = $reqAll['level'];
            $teacher = DB::table('teachers')->where('teach_'.$subject, '=' , '1')->where($subject.'_level','<',$level)->get();
            $reqArray[] = $teacher;
        }
        elseif($request->has('subject'))
        {
            $subject = $reqAll['subject'];
            $level = $reqAll['level'];
            $teacher = DB::table('teachers')->where('teach_'.$subject, '=' , '1')->where($subject.'_level','<',$level)->get();
            $reqArray[] = $teacher;
        }
        
        
        
        if($request->has('name'))
        {

        }
        if($request->has('town'))
        {

        }

        var_dump($query . $ageQ);
        $teachers = DB::select($query . $ageQ , array('age' => $age, 'age2' => $age2));
        var_dump($teachers);
        exit();


       // $teachers =


        return view('learn.teacherdb', ['rows' => $rows,'teachers' => $teachers,]);
    }
}
