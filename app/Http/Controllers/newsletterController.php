<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use Newsletter;
use App\Teacher;
use DrewM\MailChimp\MailChimp;
class newsletterController extends Controller
{
    //
    public function addtolist(Request $request)
    {
        $sub = new Subscriber();
        $sub->email = $request->email;
        $sub->save();
        $request->session()->flash('alert-success','Thanks for subscribing! Please check your email!');
        return 'success';

            
    }
    public function sub_teacher(Teacher $teacher)
    {
        {
            $email = $teacher->email;
            $fname = $teacher->first_name;
            $lname = $teacher->last_name;
            Newsletter::subscribe($email,['FNAME'=>$fname,'LNAME'=>$lname] , 'rymn_teachers');
            if(Newsletter::lastActionSucceeded())
            {

                return true;
            }
            else{

                return false;
            }

        }
    }
    public function sub_group(Group $group)
    {
        $email = $group->email;
        $name = $group->group_name;
        Newsletter::subscribe($email,['firstName'=>$name] , 'rymn_groups');
        if(Newsletter::lastActionSucceeded())
        {

            return true;
        }
        else{

            return false;
        }

    }
}
