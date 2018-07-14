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
		$notification = array();

        $winnerList = array();
        $dailyWinner = DailyWinner::all();
        foreach ($dailyWinner as $item)
        {
            $winnerList[] = $item->player_id;
        }

        $match = Match::selectRaw('b.id, matches.player_id, MAX(matches.points) AS point')
			->leftjoin('matches AS b','matches.id','=','b.id')
            ->whereNotIn('matches.player_id',$winnerList)
            ->where('matches.points','<=','1300')
			->where('matches.completion_status',1)
            ->whereBetween('matches.created_at', [date('Y-m-d 00:00:00', strtotime(date('Y-m-d 00:00:00'). ' -1 day')),date('Y-m-d 00:00:00')])
            ->groupBy('matches.player_id')->orderBy('point','desc')->take(10)->get();   
			
		echo $match;

        if ($match)
        {
            foreach($match as $item)
            {
				$guid = guid();
                $dailyWinner = new DailyWinner;
                $dailyWinner->player_id = $item->player_id;
                $dailyWinner->match_id = $item->id;
                $dailyWinner->guid = $guid;
                $dailyWinner->save();

                $player = Player::where('id',$item->player_id)->first();

                $notificationData = array(
                    'fromEmail' => 'postmaster@mailgun.swisswatchgallery.com.my',
                    'fromName' => 'Revolution by Time Kulture 2018',
                    'toEmail' => (new Player)->getEmailByToken($player->unique_token),
                    'toName' => getFullNameByToken($player->unique_token),
                    'introname' => getFullNameByToken($player->unique_token),
                    'intromessage' => "You've won the daily prize - Revolution by Time Kulture 2018. Your code is " . $guid,
                    'content' => '',
                );
                $email = (new GeneralModel)->sentEmailNotification($notificationData,'emails.daily');
				
				array_push($notification, array('guid' => $guid,'name' => getFullNameByToken($player->unique_token),'email'=>(new Player)->getEmailByToken($player->unique_token))); 
            }
			
			$emailData = array(
					'fromEmail' => 'postmaster@mailgun.swisswatchgallery.com.my',
                    'fromName' => 'Revolution by Time Kulture 2018',
                    'toEmail' => 'tai.weeyang@valiram.com',
                    'toName' => 'Tai Wee Yang',
					'ccEmail' => 'ahdesya@induco.asia',
					'ccName' => 'Ahdesya',
                    'introname' => 'Tai Wee Yang',
                    'intromessage' => "Daily Winners Notification ".date('Y-m-d', strtotime(date('Y-m-d'). ' -1 day')),
                    'daily' => date('Y-m-d', strtotime(date('Y-m-d'). ' -1 day')),
					'winners' => $notification,
				);
			$emailNotification = (new GeneralModel)->sentEmailNotificationWithCc($emailData,'emails.notification');
			
			$emailData = array(
					'fromEmail' => 'postmaster@mailgun.swisswatchgallery.com.my',
                    'fromName' => 'Revolution by Time Kulture 2018',
                    'toEmail' => 'haslesani.ramli@valiram.com',
                    'toName' => 'Haslesani Ramli',
					'ccEmail' => 'ahdesya@induco.asia',
					'ccName' => 'Ahdesya',
                    'introname' => 'Haslesani Ramli',
                    'intromessage' => "Daily Winners Notification ".date('Y-m-d', strtotime(date('Y-m-d'). ' -1 day')),
                    'daily' => date('Y-m-d', strtotime(date('Y-m-d'). ' -1 day')),
					'winners' => $notification,
				);
			$emailNotification = (new GeneralModel)->sentEmailNotificationWithCc($emailData,'emails.notification');
			
			$emailData = array(
					'fromEmail' => 'postmaster@mailgun.swisswatchgallery.com.my',
                    'fromName' => 'Revolution by Time Kulture 2018',
                    'toEmail' => 'sharmini.kumar@valiram.com',
                    'toName' => 'Sharmini Kumar',
					'ccEmail' => 'ahdesya@induco.asia',
					'ccName' => 'Ahdesya',
                    'introname' => 'Sharmini Kumar',
                    'intromessage' => "Daily Winners Notification ".date('Y-m-d', strtotime(date('Y-m-d'). ' -1 day')),
                    'daily' => date('Y-m-d', strtotime(date('Y-m-d'). ' -1 day')),
					'winners' => $notification,
				);
			$emailNotification = (new GeneralModel)->sentEmailNotificationWithCc($emailData,'emails.notification');
        } 
    }
}
