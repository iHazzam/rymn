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
        unset($rows[0]); $rows[1] = "-"; //remove the first two columns (the headers)
        array_pop($rows); array_pop($rows); //remove the timestamps
        $rows = str_replace('_',' ',$rows); //replace all underscores with spaces
        $reqAll = $request->all();
        unset($request[0]); //remove csrf token
        foreach($reqAll as )
        {
            var_dump($r);
            echo("</br>");
        }

        $teachers = DB::table('teachers')->select()->where('');
        exit();


       // $teachers =

        return view('learn.teacherdb', ['rows' => $rows,'teachers' => $teachers,]);
    }
}
