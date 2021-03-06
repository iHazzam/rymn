<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Event;
use App\Group;
use Illuminate\Support\Facades\Input;
use Google_Client;
use \Spatie\GoogleCalendar;
class discoverController extends Controller
{
    //
    public function calendar()
    {
        return view('discover.calendar');
    }
    public function social(){
        return view('discover.social');
    }
    public function updateCalendar(Event $event){
        $e = new \Spatie\GoogleCalendar\Event;
        $date = $event->date;
        $start_time = $event->start_time;
        $end_time = $event->end_time;
        $date = strtok($date,' ');
        $SdateTime = $date . " " . $start_time;
        $EdateTime = $date . " " . $end_time;
        try
        {
            $time = Carbon::createFromFormat('Y-m-d H:i:s',$SdateTime, 'Europe/London');
        }
        catch(\Exception $err)
        {
            try{
                $time = Carbon::createFromFormat('Y-m-d H:i',$SdateTime, 'Europe/London');
            }
            catch(\Exception $err2){
                return redirect()->back()->withErrors("Sorry, fatal error - please contact the administrator");
            }
        }
        try
        {
            $endTime = Carbon::createFromFormat('Y-m-d H:i:s',$EdateTime, 'Europe/London');
        }
        catch(\Exception $err)
        {
            try{
                $endTime = Carbon::createFromFormat('Y-m-d H:i',$EdateTime, 'Europe/London');
            }
            catch(\Exception $err2){
                return redirect()->back()->withErrors("Sorry, fatal error - please contact the administrator");
            }
        }


        $heldby = Group::find($event->group_id);
        $e->name = $event->name . " - an event held by " . $heldby->group_name ;
        $e->startDateTime = $time;
        $e->endDateTime = $endTime;
        $e->save();
        return $e->id;

    }
    public function updateEventCalendar(Event $event)
    {
        $eventId = $event->spatieID;
        $e = \Spatie\GoogleCalendar\Event::find($eventId);

    }
    public function map()
    {

        $events = Event::where('date', '>', Carbon::now())->get();
        $array = json_encode($events);
        $array2 = [];
        foreach ($events as $a)
        {
            $a = json_decode(json_encode($a));
            $name = $a->name;
            $address = "";
            if($a->concert_address_line2 != null)
            {
                $address = $a->concert_address_line1 . "<br>" . $a->concert_address_line2 . "<br>" . $a->city . "<br>" . $a->postcode;
            }
            else{

                $address = $a->concert_address_line1 . "<br>" . $a->city . "<br>" . $a->postcode;
            }
            $date = str_split($a->date,10)[0];
            $datetime = $date . " " . $a->start_time;
            $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime, 'Europe/London')->toDayDateTimeString();
            $concert_details = $a->concert_details;
            $postcode = $a->postcode;

            $coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($postcode) . '&sensor=true');
            $coordinates = json_decode($coordinates);
            $lat = $coordinates->results[0]->geometry->location->lat;
            $lng = $coordinates->results[0]->geometry->location->lng;

            $ensemble=Group::where('id','=',$a->group_id)->select('group_name')->first();
            $ensemble = $ensemble->group_name;
            $array2[] = ['name' => $name,'address'=>$address,'datetime'=>$datetime,'concert_details'=>$concert_details,'lati'=>$lat,'lngi'=>$lng, 'ensemble'=>$ensemble];
        }
        return view('discover.map', ['events' => $array2]);
    }

    public function newsletter()
    {
        return view('discover.newsletter');
    }

    public function newEvent(Request $request)
    {
        $req = $request->all();
        $this->validate($request, [
            'group' => 'required',
            'name' => 'required',
            'date' => 'required|date|after:today',
            'start_time' => 'required',
            'end_time' => 'required',
            'addr1' => 'required',
            'postcode' => 'required',
        ]);
        $error = false;
        $error_reason = "";
        $event = new Event;
        $event->name = $req['name'];
        $event->group_id = $req['group'];
        $event->date = $req['date'];
        $event->start_time = $req['start_time'];
        $event->end_time = $req['end_time'];
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
        if($request->has('ticket_info'))
        {
            $event->ticket_info = $req['ticket_info'];
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
            $spatieID = $this->updateCalendar($event);
            $event->spatieID = $spatieID;
            $event->save();

            $request->session()->flash('alert-success', "Thanks! Event added succesfully!");
            return redirect('/discover');
        }
        else{
            $request->session()->flash('alert-danger',$error_reason);
            return Redirect::back()->withInput()->withErrors($error_reason);
        }
    }
    public function postEditEvent(Request $request, $id)
    {

        $req = $request->all();
        $this->validate($request, [
            'group' => 'required',
            'name' => 'required',
            'date' => 'required|date|after:today',
            'start_time' => 'required',
            'end_time' => 'required',
            'addr1' => 'required',
            'postcode' => 'required',
        ]);
        $error = false;
        $error_reason = "";
        $event = Event::find($id);
        $event->name = $req['name'];
        $event->group_id = $req['group'];
        $event->date = $req['date'];
        $event->start_time = $req['start_time'];
        $event->end_time = $req['end_time'];
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
        else{
            $event->concert_address_line2 = "";
        }
        if($request->has('programnotes'))
        {
            $event->concert_details = $req['programnotes'];
        }else{
            $event->concert_details = "";
        }
        if($request->has('ticket_info'))
        {
            $event->ticket_info = $req['ticket_info'];
        }else{
            $event->ticket_info = "";
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
            $this->updateCalendar($event);
            $request->session()->flash('alert-success', "Thanks! Event edited succesfully!");
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
