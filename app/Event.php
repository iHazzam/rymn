<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use SoftDeletes;
    protected $table = 'events';
    protected $dates = ['created_at','updated_at','date','deleted_at'];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}