<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class teachController extends Controller
{
    //
    public function register()
    {
        return view('teach.register');
    }
    public function resources()
    {
        return view('teach.resources');
    }
    public function newTeach()
    {
        return redirect()->back();
    }
}
