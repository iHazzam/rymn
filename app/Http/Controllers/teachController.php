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
    public function newTeach(Request $request)
    {
        var_dump($request->all());
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'addr1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'email' => 'required',
        ]);


        exit(0);
        return redirect()->back();
    }
    function is_valid_postcode($postcode) {
        $validation_expression = '/^(((([A-PR-UWYZ][0-9][0-9A-HJKS-UW]?)|([A-PR-UWYZ][A-HK-Y][0-9][0-9ABEHMNPRV-Y]?))\s{0,2}[0-9]([ABD-HJLNP-UW-Z]{2}))|(GIR\s{0,2}0AA))$/i';

        return preg_match($validation_expression, $postcode);
    }
}
