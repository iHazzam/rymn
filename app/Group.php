<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Group extends Model
{
    use SoftDeletes;
    protected $table = 'groups';
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function events()
    {
        return $this->hasMany('App/Event');
    }
}