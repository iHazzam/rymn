<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests;

class loginController extends Controller
{
    public function getTeacherDashboard(){
        return view('edit.teacher');
    }
    public function getRepairerDashboard(){
        return view('edit.repairer');
    }
    public function getGroupDashboard(){
        return view('edit.group');
    }
    public function editEvent(Event $ev)
    {
        return view('edit.event', ['groups' => $ev]);

    }
}
