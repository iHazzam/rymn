<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Repairer extends Model
{
    use SoftDeletes;
    protected $table = 'repairers';
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function Instruments_Repaired(){
        return $this->hasOne('App\Instruments_Repaired');
    }
}
