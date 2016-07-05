<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
Use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
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
        $this->validate($request,[
            'group_name' => 'required|unique:groups|max:255',
            'grouptown' => 'required',
            'typeofgroup' => 'required',
            'biography' => 'required',
            'email' => 'required',
            'recruit_details' => 'max:2000'
        ]);

        $isrecruiting = $request->recruiting ? true : false;

        $group = new Group;
        $group->group_name = $request->group_name;
        $group->group_town = $request->grouptown;
        $group->ensemble_type = $request->typeofgroup;
        $group->group_description = $request->biography;
        $group->contact_email = $request->email;
        if(Input::file('thumbnail')) {
            if (Input::file('thumbnail')->isValid()) {
                $destPath = 'upload';
                $extension = Input::file('thumbnail')->getClientOriginalExtension();

                if ($extension == 'png' || 'gif' || 'jpg' || 'jpeg') {
                    $filename = rand(11111, 99999) . '.' . $extension;
                    Input::file('thumbnail')->move($destPath, $filename);
                    $group->thumbnail_image_path = $destPath . "/" . $filename;
                } else {
                    return Redirect::back()->withErrors(['Error: Incorrect filetype uploaded (Must be png, gif, jpg, or jpeg)']);
                }
            }
        }
        else{
            $group->thumbnail_image_path = "/upload/default.png";
        }
        $images = Input::file('images');
        $size = sizeof($images);
        if (($size > 0) && ($size[0] !== NULL))
        {

            $destPath = 'upload';
            echo('<br>');echo('<br>');echo('<br>');echo('<br>');
            if($images[0]->isValid())
            {
                $extension0 = $images[0]->getClientOriginalExtension();
                if($extension0 == 'png'||'gif'||'jpg'||'jpeg')
                {
                    $filename0 = rand(11111,99999).'.'.$extension0;

                    $images[0]->move($destPath, $filename0);

                    $group->image1_path = $destPath . "/" . $filename0;
                }
                else{
                    return Redirect::back()->withErrors(['Error: One or more incorrect filetypes uploaded (Must be png, gif, jpg, or jpeg)']);
                }
            }
            if($size > 1)
            {
                if($images[1]->isValid())
                {
                    $extension1 = $images[1]->getClientOriginalExtension();
                    if($extension1 == 'png'||'gif'||'jpg'||'jpeg')
                    {
                        $filename1 = rand(11111,99999).'.'.$extension0;

                        $images[1]->move($destPath, $filename0);

                        $group->image2_path = $destPath . "/" . $filename1;
                    }
                    else{
                        return Redirect::back()->withErrors(['Error: One or more incorrect filetypes uploaded (Must be png, gif, jpg, or jpeg)']);
                    }
                }
            }

        }
        $group->recruiting = $isrecruiting;
        if($isrecruiting)
        {
            $group->minimum_level = $request->standard;
            $group->audition = $request->audition;
            $group->recruit_details = $request->recruit_details;
        }
        $group->save();

        //add message to the redirect
        $request->session()->flash('alert-success', "Congrats, group registration was successful. You can now add this group's events to the calendar!");
        return redirect('/play');
    }
}
