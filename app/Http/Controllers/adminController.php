<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Group;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    //
    public function logout()
    {
        return redirect('logout');

    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function events()
    {
        $events = Event::all()->sortBy("created_at");
        return view('admin.dashboard.moderate_events', ['events' => $events]);
    }
    public function groups()
    {
        $groups = Group::all()->sortBy("created_at");
        return view('admin.dashboard.moderate_groups', ['groups' => $groups]);
    }
    public function teachers()
    {
        $teachers = Teacher::all()->sortBy("created_at");
        return view('admin.dashboard.moderate_teachers', ['teachers' => $teachers]);
    }
    public function social()
    {
        return view('admin.dashboard.send_social');
    }
    public function submit()
    {
        return view('admin.dashboard.submit_resource');
    }
    public function process(Request $request){
        $this->validate($request,[
            'type' => 'required',
            'file_upload' => 'mimes:txt,pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,gif,png'
        ]);
        $error = null;
        if($request->hasFile('file_upload'))
        {
            if ($request->file('file_upload')->isValid()) {
                $file = $request->file('file_upload');
                $filename = $file->getClientOriginalName();
                switch($request->type)
                {
                    case 'news':
                        if($request->file('file_upload')->getExtension() == "pdf"){
                            Storage::put('newsletters/'.$filename, File::get($file));
                        }
                        else{
                            $error = 'Newsletter filetype not PDF. Please try again';
                        }
                        break;
                    case 'voice':
                        Storage::put('resources/voice/'.$filename, File::get($file));
                        break;
                    case 'keyboard':
                        Storage::put('resources/keyboard/'.$filename, File::get($file));
                        break;
                    case 'strings':
                        Storage::put('resources/strings/'.$filename, File::get($file));
                        break;
                    case 'woodwind':
                        Storage::put('resources/woodwind/'.$filename, File::get($file));
                        break;
                    case 'brass':
                        Storage::put('resources/brass/'.$filename, File::get($file));
                        break;
                    case 'percussion':
                        Storage::put('resources/percussion/'.$filename, File::get($file));
                        break;
                    case 'guitar':
                        Storage::put('resources/guitar/'.$filename, File::get($file));
                        break;
                    case 'harp':
                        Storage::put('resources/harp/'.$filename, File::get($file));
                        break;
                    case 'other':
                        Storage::put('resources/other/'.$filename, File::get($file));
                        break;
                    default:
                        $error = 'Incorrect value checked somehow';
                        break;
                }
            }
            else{
                $error = 'Error: Added file not valid)';
            }
        }
        else{
            $error = 'Error: No file uploaded)';
        }
        if($error)
        {
            $request->session()->flash('alert-danger',$error);
            return Redirect::back()->withInput()->withErrors($error);
        }
        else{
            $request->session()->flash('alert-success',"File uploaded successfully");
            return Redirect::back();
        }
    }
    public function deleteGroup(Request $request, Group $group )
    {
        $group->delete();
        if($group->trashed())
        {
            $request->session()->flash('alert-success', "Group successfully deleted from database!");
        }
        else{
            dd("why!");
            $request->session()->flash('alert-danger', "Group not deleted. Invalid permissions or other error");
        }
        return back();
    }
    public function deleteTeacher(Request $request, Teacher $teacher )
    {
        if($teacher->delete())
        {
            $request->session()->flash('alert-success', "Group successfully deleted from database!");
        }
        else{

            $request->session()->flash('alert-danger', "Group not deleted. Invalid permissions or other error");
        }
        return back();
    }
    public function deleteEvent(Request $request, Event $event )
    {
        if($event->delete())
        {
            $request->session()->flash('alert-success', "Group successfully deleted from database!");
        }
        else{

            $request->session()->flash('alert-danger', "Group not deleted. Invalid permissions or other error");
        }
        return back();
    }
    public function getAllMailingList()
    {
        $raw_emails = DB::table('subscribers')->select('email')->get();
        $tml = DB::table('teachers')->select('email')->get();
        $gml = DB::table('groups')->select('contact_email')->get();
        $processString = "";
        $debunk = [];
        foreach($raw_emails as $r)
        {
            $debunk[] = $r->email;
        }
        foreach($tml as $t)
        {
            $debunk[] = $t->email;
        }
        foreach($gml as $g)
        {
            $debunk[] = $g->contact_email;
        }
        $debunk = $this->array_iunique($debunk);
        foreach($debunk as $k => $d)
        {
            $processString = $processString . $d . ";";
        }
        return json_encode($processString);
    }
    public function getTeachersMailingList()
    {
        $raw_emails = DB::table('teachers')->select('email')->get();
        $processString = "";
        $debunk = [];
        foreach($raw_emails as $r)
        {
            $debunk[] = $r->email;
        }
        $debunk = $this->array_iunique($debunk);
        foreach($debunk as $k=>$d)
        {
            $processString = $processString . $d . ";";
        }
        return json_encode($processString);
    }
    public function getGroupsMailingList()
    {
        $raw_emails = DB::table('groups')->select('contact_email')->get();
        $processString = "";
        $debunk = [];
        foreach($raw_emails as $r)
        {
            $debunk[] = $r->contact_email;
        }
        $debunk = $this->array_iunique($debunk);
        foreach($debunk as $k=>$d)
        {
            $processString = $processString . $d . ";";
        }
        return json_encode($processString);
    }
    function array_iunique($array) {
        return array_intersect_key(
            $array,
            array_unique(array_map("StrToLower",$array))
        );
    }
}
