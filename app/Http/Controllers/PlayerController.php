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

        $headers = $request->headers->all();
        $key = $headers['x-secondlife-owner-key'][0];
        $player = Player::where('key', $key)->first();

        if($player)
            return ['response' => 'error', 'message' => 'This player allready exists.'];

        $newPlayer = Player::create([
            'key' => $key,
            'name' => $headers['x-secondlife-owner-name'][0],
            'hud_uuid' => $headers['x-secondlife-object-key'][0]
        ]);

        return ['response' => 'success', 'message' => 'Player is registered.'];

    }

}
