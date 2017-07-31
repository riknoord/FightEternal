<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $fillable = ['key','name','hud_url','hud_uuid'];

    public function stats(){

        return $this->belongsToMany('App\Stat')->withPivot('level');

    }
}
