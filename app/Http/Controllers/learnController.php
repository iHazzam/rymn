<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class learnController extends Controller
{
    //
    public function instruments()
    {
        return view('learn.instruments');
    }
    public function teacherdb()
    {
        return view('learn.teacherdb');
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
}
