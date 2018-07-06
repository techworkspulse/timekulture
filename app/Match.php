<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	public function getScoreboardNames()
	{
		return Match::selectRaw('DISTINCT player_id')->where('created_at', '>=', date('Y-m-d').' 00:00:00')->orderBy('points','desc')->take(10)->get();
	}
}
