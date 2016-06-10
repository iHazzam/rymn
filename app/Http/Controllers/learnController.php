<?php

namespace App\Http\Controllers;

use App\Instruments_Taught;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;

class learnController extends Controller
{
    //
    public function instruments()
    {
        return view('learn.instruments');
    }
    public function teacherdb()
    {
        $teachers = ['temp','teacher2','test3','test4'];
        $rows = ['-','violin','viola','cello','double bass','harp','guitar','electric guitar','bass guitar','banjo/ukelele','other string instrument','recorder','flute','piccolo','clarinet','oboe','bassoon','saxophone','other wind instrument','cornet','trumpet','tenor horn','euphonium','trombone','french horn','tuba','other brass instrumnent','piano','harpshichord','organ','keyboard','other keys','xylophone','marimba','drum kit','timpani','other percussion','classical singing','musical theatre singing', 'jazz singing','opera singing','pop singing', 'other singing'];
        return view('learn.teacherdb', ['rows' => $rows,'teachers' => $teachers,]);
    }
    public function parents()
    {
        return view('learn.parents');
    }
    public function kids()
    {
        return view('learn.kids');
    }
    public function newInfo()
    {
        return redirect('/learn');
    }
}
