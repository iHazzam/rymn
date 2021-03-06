<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
Use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
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
    public function join()
    {
        $groups = Group::all();
        foreach ($groups as $group)
        {
            $group = str_replace("_"," ",$group);
            if(property_exists($group, "minimum_level"))
            {
                if($group->minimum_level == 'concert soloist')
                {

                }
                else if($group->minimum_level == ('diploma' | null) )
                {

                }
                else{
                    $group->level = str_replace('grade','grade ',$group->level);
                }
            }
        }
        $cities = ['ripon'=>'Ripon','thirsk'=>'Thirsk','easingwold'=>'Easingwold','boroughbridge'=>'Boroughbridge','harrogate'=>'Harrogate','knaresborough'=>'Knaresborough','pately_bridge'=>'Pately Bridge','northallerton'=>'Northallerton','ripley'=>'Ripley','masham'=>'Masham','richmond'=>'Richmond','skipton'=>'Skipton'];
        $types = ['other' => 'Other', 'brass_band'=>'Brass Band','choir'=>'Choir','community_group'=>'Community Group','orchestra'=>'Orchestra','percussion_ensemble'=>'Percussion Ensemble','string_chamber_group'=>'String Chamber Ensemble','string_group'=>"String Group",'wind_band'=>'Wind band','wind_chamber_group'=>'Wind Chamber Ensemble','brass_chamber_group'=>'Brass Chamber Ensemble'];


        return view('play.join',['groups' => $groups, 'cities'=>$cities,'types'=>$types]);
    }
    public function search(Request $request){

        $reqall = $request->all();
        $reqArray = [];
        if($request->has('type'))
        {
            $type = $reqall['type'];
            $groups = DB::table('groups')->where('ensemble_type', '=', $type)->get();
            $reqArray[] = $groups;

        }
        if($request->has('location'))
        {
            $type = $reqall['location'];
            $groups = DB::table('groups')->where('group_town', '=', $type)->get();
            $reqArray[] = $groups;
        }
        if($request->has('recruiting'))
        {
            $type = $reqall['recruiting'];
            $groups = DB::table('groups')->where('recruiting', '=', 1)->get();
            $reqArray[] = $groups;
        }

        $ids = $this->restrictValues($reqArray);
        $groups = [];
        if(count($ids) > 1)
        {

            $ids_final = call_user_func_array('array_intersect', $ids);
            foreach($ids_final as $id)
            {
                $groups[] = DB::table('groups')->where('id', '=', $id)->get();
            }
        }
        elseif($ids != null) {
            //if is 2d array
            if (count($ids) != count($ids, COUNT_RECURSIVE))
            {
                $ids = call_user_func_array('array_merge', $ids);
            }

            if(!is_array($ids[0]))
            {
                foreach ($ids as $id) {
                    $groups[] = DB::table('groups')->where('id', '=', $id)->get();
                }
            }
            else{
                foreach ($ids[0] as $id) {
                    $groups[] = DB::table('groups')->where('id', '=', $id)->get();
                }
            }

        }
        else{
            $request->session()->flash('alert-danger',"No results found for this search! Please try again!");
            return Redirect::back();
        }

        foreach ($groups as $group)
        {
            if(is_array($group[0]))
            {
                $group = $group['0'];
            }
            $group = $group[0];
            if(property_exists($group, "minimum_level"))
            {
                if($group->minimum_level == 'concert soloist')
                {

                }
                else if($group->minimum_level == ('diploma' | null) )
                {

                }
                else{
                    $group->level = str_replace('grade','grade ',$group->level);
                }
            }
        }
        $cities = ['ripon'=>'Ripon','thirsk'=>'Thirsk','easingwold'=>'Easingwold','boroughbridge'=>'Boroughbridge','harrogate'=>'Harrogate','knaresborough'=>'Knaresborough','pately_bridge'=>'Pately Bridge','northallerton'=>'Northallerton','ripley'=>'Ripley','masham'=>'Masham','richmond'=>'Richmond','skipton'=>'Skipton'];
        $types = ['other' => 'Other', 'brass_band'=>'Brass Band','choir'=>'Choir','community_group'=>'Community Group','orchestra'=>'Orchestra','percussion_ensemble'=>'Percussion Ensemble','string_chamber_group'=>'String Chamber Ensemble','string_group'=>"String Group",'wind_band'=>'Wind band','wind_chamber_group'=>'Wind Chamber Ensemble','brass_chamber_group'=>'Brass Chamber Ensemble'];

        return view('play.join',['groups' => $groups, 'cities'=>$cities,'types'=>$types]);
    }




    public function why()
    {
        return view('play.why');
    }
    //post
    public function newAd(Request $request)
    {
        //handle form
        $this->validate($request, [
            'group_name' => 'required|unique:groups|max:255',
            'grouptown' => 'required',
            'typeofgroup' => 'required',
            'biography' => 'required',
            'email' => 'required',
            'recruit_details' => 'max:2000'
        ]);
        $error = false;
        if ($request->password != $request->password2) {
            $error = true;
            $errormessage = "Passwords do not match!";
        }
        $isrecruiting = true;

        $group = new Group;
        $group->group_name = $request->group_name;
        $group->group_town = $request->grouptown;
        $group->ensemble_type = $request->typeofgroup;
        $group->group_description = $request->biography;
        $group->contact_email = $request->email;
        if ($request->has('facebook')) {
            $group->facebook = $request->facebook;
        }
        if ($request->has('website')) {
            $group->website = $request->website;
        }
        if (Input::file('thumbnail')) {
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
        } else {
            $group->thumbnail_image_path = "upload/default.png";
        }
        if (Input::file('images')) {
            if (Input::file('images')->isValid()) {
                $destPath = 'upload';
                $extension = Input::file('images')->getClientOriginalExtension();

                if ($extension == 'png' || 'gif' || 'jpg' || 'jpeg') {
                    $filename = rand(11111, 99999) . '.' . $extension;
                    Input::file('images')->move($destPath, $filename);
                    $group->image1_path = $destPath . "/" . $filename;
                } else {
                    return Redirect::back()->withErrors(['Error: Incorrect filetype uploaded (Must be png, gif, jpg, or jpeg)']);
                }
            }
        }

        $group->recruiting = true;
        if($isrecruiting)
        {
            $group->minimum_level = $request->standard;
            $group->audition = $request->audition;
            $group->recruit_details = $request->recruit_details;
        }
        if($error == false)
        {
            $input['email'] = $request->email;
            $rules = array('email' => 'unique:users,email');
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $user = User::where('email', '=', $request->email)->get();
                $user = $user['0'];
                $userid = $user->id;
                $user->is_group = true;
                $user->save();
                $group->user_id = $userid;
            }
            else{
                $user = new User();
                $user->name = $request->group_name;
                $user->email = $request->email;
                $user->password =  bcrypt($request->password);
                $user->is_group = true;
                $user->save();
                $group->user_id = $user->id;
            }

            $group->save();
        }
        else{
            return redirect()->back()->withInput(Input::all())->withErrors($errormessage);
        }


        //add message to the redirect
        $request->session()->flash('alert-success', "Congrats, group registration was successful. You can now add this group's events to the calendar!");
        return redirect('/play');
    }
    function restrictValues($array)
    {
        $array_keys = [];
        foreach ($array as $key => $tier2)
        {
            foreach($tier2 as $key2 => $tier3)
            {
                $array_keys[$key][$key2] = $tier3->id;
            }
        }
        return $array_keys;
    }
    function getGroupContactDetails($id){
        $group = Group::where('id','=',$id)->first();
        $groups = [];
        $groups['email'] = $group->contact_email;
        return json_encode($groups);

    }

    public function editAd(Request $request)
    {
        //handle form
        $this->validate($request,[
            'group_name' => 'required|max:255',
            'grouptown' => 'required',
            'typeofgroup' => 'required',
            'biography' => 'required',
            'email' => 'required',
            'recruit_details' => 'max:2000'
        ]);
        $error = false;
        $errormessage = "Sorry, something went wrong, please contact an administrator";
        $isrecruiting = true;

        $group = Group::whereUser_id(Auth::user()->id)->first();
        $group->group_name = $request->group_name;
        $group->group_town = $request->grouptown;
        $group->ensemble_type = $request->typeofgroup;
        $group->group_description = $request->biography;
        $group->contact_email = $request->email;
        if($request->has('facebook'))
        {
            $group->facebook  = $request->facebook;
        }
        else{
            $group->facebook = "";
        }
        if($request->has('website'))
        {
            $group->website = $request->website;
        }
        else{
            $group->website = "";
        }
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
            //$group->thumbnail_image_path = "upload/default.png"; else don't change the thumbnail path
        }
        if (Input::file('images')) {
            if (Input::file('images')->isValid()) {
                $destPath = 'upload';
                $extension = Input::file('images')->getClientOriginalExtension();

                if ($extension == 'png' || 'gif' || 'jpg' || 'jpeg') {
                    $filename = rand(11111, 99999) . '.' . $extension;
                    Input::file('images')->move($destPath, $filename);
                    $group->image1_path = $destPath . "/" . $filename;
                } else {
                    return Redirect::back()->withErrors(['Error: Incorrect filetype uploaded (Must be png, gif, jpg, or jpeg)']);
                }
            }
        }
        $group->recruiting = true;
        if($isrecruiting)
        {
            $group->minimum_level = $request->standard;
            $group->audition = $request->audition;
            $group->recruit_details = $request->recruit_details;
        }
        if($error == false)
        {
            $input['email'] = $request->email;
            $rules = array('email' => 'unique:users,email');
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $user = User::where('email', '=', $request->email)->first();
                $userid = $user->id;
                $user->is_group = true;
                $user->save();
                $group->user_id = $userid;
            }
            else{
                $user = new User();
                $user->name = $request->group_name;
                $user->email = $request->email;
                $user->password =  bcrypt($request->password);
                $user->is_group = true;
                $user->save();
            }

            $group->save();
        }
        else{
            return redirect()->back()->withInput(Input::all())->withErrors($errormessage);
        }


        //add message to the redirect
        $request->session()->flash('alert-success', "This group was edited successfully!");
        return redirect('/play');
    }















}
