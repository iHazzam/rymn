<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Event;
use App\Group;
use Illuminate\Support\Facades\Input;
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

    public function newEvent(Request $request)
    {
        $req = $request->all();
        var_dump($req);
        $this->validate($request, [
            'group' => 'required',
            'date' => 'required|date|after:tomorrow',
            'time' => 'required',
            'addr1' => 'required',
            'postcode' => 'required',
        ]);
        $error = false;
        $error_reason = "";
        $event = new Event;
        $event->group_id = $req['group'];
        $event->date = $req['date'];
        $event->time = $req['time'];
        $event->city = $req['city'];
        if ($this->is_valid_postcode($req['postcode']))
        {
            $event->postcode =  $req['postcode'];
        }
        else{
            $error = true;
            $error_reason= "Invalid Postcode!";
        }
        $event->concert_address_line1 = $req['addr1'];
        if($request->has('addr2'))
        {
            $event->concert_address_line2 = $req['addr2'];
        }
        if($request->has('programnotes'))
        {
            $event->concert_details = $req['programnotes'];
        }
        if($request->has('ticket_price'))
        {
            $event->ticket_cost = $req['ticket_price'];
        }

        if(Input::file('thumbnail_image')) {
            if (Input::file('thumbnail_image')->isValid()) {
                $destPath = 'upload';
                $extension = Input::file('thumbnail_image')->getClientOriginalExtension();

                if ($extension == 'png' || 'gif' || 'jpg' || 'jpeg') {
                    $filename = rand(11111, 99999) . '.' . $extension;
                    Input::file('thumbnail_image')->move($destPath, $filename);
                    $event->thumbnail_img = $destPath . "/" . $filename;
                } else {
                    return Redirect::back()->withErrors(['Error: Incorrect filetype uploaded (Must be png, gif, jpg, or jpeg)']);
                }
            }
        }
        else{
        $event->thumbnail_img = "/upload/event_default.png";
    }
        if($error == false)
        {

            $event->save();
            $request->session()->flash('alert-success', "Thanks! Teacher registration complete!");
            return redirect('/discover');
        }
        else{
            $request->session()->flash('alert-danger',$error_reason);
            return Redirect::back()->withInput()->withErrors($error_reason);
        }
    }

    public function addEvent()
    {
        $groups_model = Group::all();
        $groups = [];
        $ids = [];
        foreach($groups_model as $g)
        {
            $groups[] = $g->group_name;
            $ids[] = $g->id;
        }

        return view('discover.add', ['groups' => $groups, 'ids' => $ids]);
    }

    public function about()
    {
        return view('discover.about');
    }
    function is_valid_postcode($postcode) {
        $validation_expression = '/^(((([A-PR-UWYZ][0-9][0-9A-HJKS-UW]?)|([A-PR-UWYZ][A-HK-Y][0-9][0-9ABEHMNPRV-Y]?))\s{0,2}[0-9]([ABD-HJLNP-UW-Z]{2}))|(GIR\s{0,2}0AA))$/i';

        return preg_match($validation_expression, $postcode);
    }
}
