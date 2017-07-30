<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function stats(){

        return $this->belongsToMany('App\Stat')->withPivot('level');

    }
}
