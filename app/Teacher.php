<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Teacher extends Model
{
    use SoftDeletes;
    protected $table = 'teachers';
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function Instruments_Taught(){
        return $this->hasOne('App\Instruments_Taught');
    }
}
