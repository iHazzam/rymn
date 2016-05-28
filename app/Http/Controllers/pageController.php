<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class pageController extends Controller
{
    //
    public function home()
    {
        return view('homepage');
    }
    public function learn()
    {
        return view('learn');
    }
    public function teach()
    {
        return view('teach');
    }
    public function play()
    {
        return view('play');
    }
    public function discover()
    {
        return view('discover');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
