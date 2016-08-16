<?php

namespace App\Http\Controllers;

use App\Group;
use App\Instruments_Taught;
use Illuminate\Http\Request;
use App\Event;
use App\Teacher;
use App\Repairer;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class loginController extends Controller
{
    public function getTeacherDashboard(){

        $data = Teacher::whereUser_id(Auth::user()->id)->first();
        $data2 = $data->Instruments_Taught()->first();
        return view('edit.teacher',['data'=> $data, 'data2'=>$data2]);
    }
    public function getRepairerDashboard(){
        $data = Repairer::whereUser_id(Auth::user()->id)->first();
        $data2 = $data->Instruments_Repaired()->first();
        return view('edit.repairer',['data'=> $data, 'data2'=>$data2]);
    }
    public function getGroupDashboard(){
        $data = Group::whereUser_id(Auth::user()->id)->first();
        return view('edit.group', ['data' => $data]);
    }
    public function getGroupEvents(){
        $group_model = Group::whereUser_id(Auth::user()->id)->first();
        $groupid = $group_model->id;
        $events = Event::whereGroup_id($groupid)->get();
        $dates = [];
        foreach($events as $e){
            $dates[] = $e['date']->toFormattedDateString();
        }

        $group = $group_model->group_name;
        return view('edit.event',['group' => $group, 'events'=>$events, 'dates'=>$dates]);
    }
    public function editEvent($id)
    {
        $data = Event::find($id);
        $groups_model = Group::all();
        $groups = [];
        $ids = [];
        foreach($groups_model as $g)
        {
            $groups[] = $g->group_name;
            $ids[] = $g->id;
        }
        return view('edit.singleEvent', ['data' => $data,'groups'=>$groups,'ids'=>$ids]);

    }
    
}
