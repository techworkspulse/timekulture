<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	public function getScoreboardNames()
	{
		$winnerList = array();
        $dailyWinner = DailyWinner::all();
        foreach ($dailyWinner as $item)
        {
            $winnerList[] = $item->player_id;
        }
		
		return Match::selectRaw('MAX(points) AS point, player_id')->whereNotIn('player_id',$winnerList)->where('created_at', '>=', date('Y-m-d').' 00:00:00')->where('point','<=','1300')->where('completion_status',1)->groupBy('player_id')->orderBy('point','desc')->take(10)->get();
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
