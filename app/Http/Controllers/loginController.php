<?php

namespace App\Http\Controllers;

use App\Group;
use App\Instruments_Taught;
use Illuminate\Http\Request;
use App\Event;
use App\Teacher;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class loginController extends Controller
{
    public function getTeacherDashboard(){
        $data = Teacher::where('user_id','==', Auth::user()->id)->first();
        $data2 = $data->instruments_taught;
        return view('edit.teacher',['data'=> $data, 'data2'=>$data2]);
    }
    public function getRepairerDashboard(){
        return view('edit.repairer');
    }
    public function getGroupDashboard(){
        $data = Group::where('user_id', '==', Auth::user()->id)->first();
        return view('edit.group', ['data' => $data]);
    }
    public function editEvent(Event $ev)
    {
        return view('edit.event', ['groups' => $ev]);

    }
}
