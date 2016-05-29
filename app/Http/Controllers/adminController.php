<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
        return view('admin.dashboard.moderate_events');
    }
    public function groups()
    {
        return view('admin.dashboard.moderate_groups');
    }
    public function teachers()
    {
        return view('admin.dashboard.moderate_teachers');
    }
    public function social()
    {
        return view('admin.dashboard.send_social');
    }
    public function submit()
    {
        return view('admin.dashboard.submit_resource');
    }

}
