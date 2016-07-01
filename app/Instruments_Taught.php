<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruments_Taught extends Model
{
    //
    protected $table = 'instruments_taught';
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

}


