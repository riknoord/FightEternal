<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{

    public function find($key){

        $player =  Player::where('key', $key)->with('stats')->first();

        return ["name" => $player->name , "Stat" => $player->stats[0]->name , "StatLevel" => $player->stats[0]->pivot->level];

    }

    public function register(Request $request){

        print_r($request->headers->all());

    }

}
