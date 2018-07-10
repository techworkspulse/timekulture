<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DailyWinner;
use App\Match;
use App\Player;
use App\GeneralModel;
use Sujip\Guid\Guid;
use DB;

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
        $guid = guid();



        $winnerList = array();
        $dailyWinner = DailyWinner::all();
        foreach ($dailyWinner as $item)
        {
            $winnerList[] = $item->player_id;
        }

        $match = Match::selectRaw('id, MAX(points) AS point, player_id')
            ->whereNotIn('player_id',$winnerList)
            ->whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime(date('Y-m-d 00:00:00'). ' -1 day')),date('Y-m-d 00:00:00')])
            ->groupBy('player_id')->orderBy('point','desc')->take(10)->get();    

        if ($match)
        {
            foreach($match as $item)
            {
                $dailyWinner = new DailyWinner;
                $dailyWinner->player_id = $item->player_id;
                $dailyWinner->match_id = $item->id;
                $dailyWinner->guid = $guid;
                $dailyWinner->save();

                $player = Player::where('id',$item->player_id)->first();

                $notificationData = array(
                    'fromEmail' => 'postmaster@mailgun.swisswatchgallery.com.my',
                    'fromName' => 'Timekulture',
                    'toEmail' => (new Player)->getEmailByToken($player->unique_token),
                    'toName' => getFullNameByToken($player->unique_token),
                    'introname' => getFullNameByToken($player->unique_token),
                    'intromessage' => "You've won the daily prize - Time Kulture Revolution 2018 " . $guid,
                    'content' => '',
                );
                $email = (new GeneralModel)->sentEmailNotification($notificationData,'emails.daily');
            }
        } 
    }
}
