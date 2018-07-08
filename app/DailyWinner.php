<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyWinner extends Model
{
    public function getPastScoreboardNames()
	{
		return DailyWinner::where('created_at', '>=', date('Y-m-d').strtotime("-1 days"))->take(10)->get();
	}
}
