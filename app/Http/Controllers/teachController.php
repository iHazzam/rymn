<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Storage;


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
    public function newTeach()
    {
        return redirect()->back();
    }
}
