<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

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
                $filename = $request->file('file_upload')->getFilename();

                switch($request->type)
                {
                    case 'news':
                        if($request->file('file_upload')->getExtension() == "pdf"){
                            Storage::put('newsletters/'.$filename, $request->file_upload);
                        }
                        else{
                            $error = 'Newsletter filetype not PDF. Please try again';
                        }
                        break;
                    case '0':
                        Storage::put('resources/0-10/'.$filename, $request->file_upload);
                        break;
                    case '10':
                        Storage::put('resources/10-16/'.$filename, $request->file_upload);
                        break;
                    case '16+':
                        Storage::put('resources/16+/'.$filename,$request->file_upload);
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
}
