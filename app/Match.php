<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	public function getScoreboardNames()
	{
		return Match::selectRaw('DISTINCT player_id')->where('created_at', '>=', date('Y-m-d').' 00:00:00')->orderBy('points','desc')->take(10)->get();
	}

	public function getPuzzleNameByMatchId($mid)
	{
		return Match::leftjoin('puzzles','matches.puzzle_id','=','puzzles.id')->select('puzzles.name as name')->where('matches.id',$mid)->first()->name;
	}
}
