<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DailyWinner;
use App\Match;
use App\Player;
use App\GeneralModel;

class GenerateDailyWinners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timekulture:generateDailyWinners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate 10 daily winners';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $match = Match::select('matches.id','matches.player_id','players.unique_token')
                ->leftjoin('daily_winners','matches.id','=','daily_winners.match_id')
                ->leftjoin('players','matches.player_id','=','players.id')
                ->where('created_at', '>=', date('Y-m-d').' 00:00:00')
                ->where('matches.player_id','<>','daily_winners.player_id')
                ->orderBy('points','desc')->take(10)->get();

        if ($match)
        {
            foreach($match as $item)
            {
                $dailyWinner = new DailyWinner;
                $dailyWinner->player_id = $item['player_id'];
                $dailyWinner->match_id = $item['id'];
                $dailyWinner->save();

                $notificationData = array(
                    'fromEmail' => 'postmaster@mailgun.swisswatchgallery.com.my',
                    'fromName' => 'Timekulture',
                    'toEmail' => (new Player)->getEmailByToken($data['unique_token']),
                    'toName' => getFullNameByToken($data['unique_token']),
                    'introname' => getFullNameByToken($data['unique_token']),
                    'intromessage' => 'Timekulture - Thank You',
                    'content' => '',
                );
                $email = (new GeneralModel)->sentEmailNotification($notificationData,'emails.daily');
            }
        } 
    }
}
