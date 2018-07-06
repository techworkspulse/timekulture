<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function getFullNameByToken($uniqueToken)
    {
    	return Player::select('name')->where('unique_token',$uniqueToken)->first()->name;
    }

    public function getFullNameById($pid)
    {
    	return Player::select('name')->where('id',$pid)->first();
    }
}
