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
    public function privacy()
    {
        return view('privacy');
    }
    public function cookies()
    {
        return view('cookies');
    }
    public function sitemap()
    {
        return view('sitemap');
    }
    public function download($filepath)
    {
        return response()->download(storage_path($filepath));
    }
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('admin.dashboard');
        }
        else{
            return redirect()->back;
        }

    }
}
