<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyWinner extends Model
{
    public function getPastScoreboardNames()
	{
		return DailyWinner::whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime(date('Y-m-d 00:00:00'). ' -1 day')),date('Y-m-d 00:00:00')])->where('points','<=','1300')->take(10)->get();
	}
}
