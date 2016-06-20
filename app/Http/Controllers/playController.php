<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
class playController extends Controller
{
    //get
    public function groups()
    {
        return view('play.groups');
    }
    //get
    public function add_group()
    {
        return view('play.add_group');
    }
    public function why()
    {
        return view('play.why');
    }
    //post
    public function newAd(Request $request)
    {
        //handle form
        var_dump($request->all());
        exit(0);
        $this->validate($request,[

        ]);

        //add message to the redirect
        return redirect('/play');
    }
}
