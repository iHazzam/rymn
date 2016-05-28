<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class discoverController extends Controller
{
    //
    public function calendar()
    {
        return view('discover.calendar');
    }

    public function map()
    {
        return view('discover.map');
    }

    public function newsletter()
    {
        return view('discover.newsletter');
    }

    public function newEvent()
    {
        return redirect('/learn');
    }

    public function addEvent()
    {
        return view('discover.addEvent');
    }

    public function about()
    {
        return view('discover.about');
    }
}
