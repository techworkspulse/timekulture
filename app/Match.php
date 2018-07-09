<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	public function getScoreboardNames()
	{
		return Match::selectRaw('MAX(points) AS point, player_id')->where('created_at', '>=', date('Y-m-d').' 00:00:00')->groupBy('player_id')->orderBy('point','desc')->take(10)->get();
	}

	public function getPuzzleNameByMatchId($mid)
	{
		return Match::leftjoin('puzzles','matches.puzzle_id','=','puzzles.id')->select('puzzles.name as name')->where('matches.id',$mid)->first()->name;
	}

	public function getPuzzleURLByMatchId($mid)
	{
		return Match::leftjoin('puzzles','matches.puzzle_id','=','puzzles.id')->select('puzzles.url as url')->where('matches.id',$mid)->first()->url;
	}

	public function getLivesByToken($token)
	{
		return Match::leftjoin('players','matches.player_id','=','players.id')->select('players.live_count as lives')->where('players.unique_token',$token)->first()->lives;
	}
}
