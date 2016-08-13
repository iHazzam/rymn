<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruments_Repaired extends Model
{
    //
    protected $table = 'instruments_repaired';
    public function teacher()
    {
        return $this->belongsTo('App\Repairer');
    }

}


