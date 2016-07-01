<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $table = 'teachers';
    public function Instruments_Taught(){
        return $this->hasOne('App\Instruments_Taught');
    }
}
