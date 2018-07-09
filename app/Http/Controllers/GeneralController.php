<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Player;
use App\Match;
use App\MatchLog;
use App\Reward;
use App\GeneralModel;

class GeneralController extends Controller
{
	public function registration()
	{
		return view('register');
	}

	public function game()
	{
		return view('gametk');
	}

	public function index()
	{
		return view('index');
	}

	public function bonus()
	{
		return view('bonus');
	}

	public function scoreboard()
	{
		return view('scoreboard');
	}

	protected function createPlayerValidator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|string|max:50',
			'gender' => 'required',
			'phone' => 'required|digits_between:9,13',
			'email' => 'required|email',
		]);
	}

    public function createPlayer(Request $request)
    {
    	$uniqueToken = md5(uniqid(rand(), true));

    	$data = $request->all();

        $validator = $this->createPlayerValidator($data);
        if ($validator->fails()) 
        {
            $result = array('status' => false, 'message' => $validator->errors());
        }
        else
        {
        	$player = Player::where('email', $data['email'])->first();

        	if ($player)
        	{
        		if ($player->live_count == 0)
        		{
        			$result = array('status' => false,'message' => 'No more lives available'); 
        		}
        		else
        		{
        			$player->name = $data['name'];
		        	$player->gender_id = $data['gender'];
		        	$player->phone = $data['phone'];
		        	$player->email = $data['email'];
		        	$player->unique_token = $uniqueToken;
		        	$player->save();

		        	$match = new Match;
		        	$match->player_id = $player->id;
	        		$match->save();

		        	$result = array('status' => true,'message' => $player->unique_token,'matchid' => $match->id); 
		        }
        	}
        	else
        	{
        		$player = new Player;
	        	$player->name = $data['name'];
	        	$player->gender_id = $data['gender'];
	        	$player->phone = $data['phone'];
	        	$player->email = $data['email'];
	        	$player->live_count = 9;
	        	$player->dailywinner_status = 0;
	        	$player->voucher_status = 0;
	        	$player->unique_token = $uniqueToken;
	        	$player->save();

	        	$match = new Match;
	        	$match->player_id = $player->id;
	        	$match->save();

	        	$result = array('status' => true,'message' => $uniqueToken,'matchid' => $match->id); 
        	}
        }

        return json_encode($result);
    }

    protected function updatePlayerValidator(array $data)
    {
    	return Validator::make($data, [
			'email' => 'required|email',
		]);
    }

    public function updatePlayer(Request $request)
    {
    	$uniqueToken = md5(uniqid(rand(), true));

    	$data = $request->all();

        $validator = $this->updatePlayerValidator($data);
        if ($validator->fails()) 
        {
            $result = array('status' => false, 'message' => $validator->errors()->first());
        }
        else
        {
        	$player = Player::where('email', $data['email'])->first();

        	if ($player)
        	{
        		if ($player->live_count == 0)
	    		{
	    			$result = array('status' => false,'message' => '**Uh Oh! You have reached your limit to play the game'); 
	    		}
	    		else
	    		{
		        	$player->email = $data['email'];
		        	$player->unique_token = $uniqueToken;
		        	$player->save();

		        	$match = new Match;
		        	$match->player_id = $player->id;
	        		$match->save();

		        	$result = array('status' => true,'message' => $player->unique_token,'matchid' => $match->id); 
	    		}
        	}
        	else
        	{
        		$result = array('status' => false,'message' => "**Uh Oh! You haven't register yet"); 
        	}
        	
        }

        return json_encode($result);
    }

    public function retryMatch(Request $request)
    {
    	$data = $request->all();

    	$player = Player::where('unique_token',$data['uniqueToken'])->first();

    	if($player)
    	{
    		$match = new Match;
    		$match->player_id = $player->id;
    		$match->save();

    		$result = array('status' => true,'message' => $match->id); 
    	}
    	else
    	{
    		$result = array('status' => false,'message' => "Invalid token"); 
    	}

    	return json_encode($result);
    }

    public function getIp()
    {
    	$ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function storeMatchData(Request $request) 
    {
    	$data = $request->all();

    	$player = Player::where('unique_token',$data['uniqueToken'])->first();

    	$match = Match::where('id',$data['matchId'])->first();
    	$match->puzzle_id = $data['puzzleId'];
    	$match->player_id = $player->id;
    	$match->minutes = $data['minutes'];
    	$match->seconds = $data['seconds'];
    	$match->moves = $data['moves'];
    	$match->points = $data['points'];
    	$match->ip_address = $this->getIp();
    	$match->completion_status = 1;
    	$match->save();

    	$player->live_count = --$player->live_count;
    	$player->save();

    	$notificationData = array(
			'fromEmail' => 'postmaster@mailgun.swisswatchgallery.com.my',
			'fromName' => 'Time Kulture Revolution 2018',
			'toEmail' => (new Player)->getEmailByToken($data['uniqueToken']),
			'toName' => getFullNameByToken($data['uniqueToken']),
			'introname' => getFullNameByToken($data['uniqueToken']),
			'intromessage' => 'Thank You For Signing Up To Play - Time Kulture Revolution 2018',
			'content' => '',
		);
		$email = (new GeneralModel)->sentEmailNotification($notificationData,'emails.thankyou');

    	$result = array('status' => true,'message' => $player->live_count); 

    	return $result;
    }

    public function getPuzzleId($token)
    {
    	$player = Player::where('unique_token',$token)->first();

    	if ($player->live_count != 0)
    	{
    		do
	    	{
	    		$random = rand(1,9);
	    		$match = Match::where('player_id',$player->id)->where('puzzle_id',$random)->count();
	    	}
	    	while($match != 0);
    	}
    	else
    	{
    		return 0;
    	}

    	return $random;
    }

    public function storeMatchLog(Request $request)
    {
    	$data = $request->all();

    	$player = Player::where('unique_token',$data['uniqueToken'])->first();

    	$matchlog = new MatchLog;
    	$matchlog->match_id = $data['matchId'];
    	$matchlog->puzzle_id = $data['puzzleId'];
    	$matchlog->player_id = $player->id;
    	$matchlog->minutes = $data['minutes'];
    	$matchlog->seconds = $data['seconds'];
    	$matchlog->moves = $data['moves'];
    	$matchlog->points = $data['points'];
    	$matchlog->ip_address = $this->getIp();
    	$matchlog->save();

    	$result = array('status' => true,'message' => ''); 

    	return $result;
    }

    public function calculatePoints(Request $request)
    {
    	$data = $request->all();

    	$player = Player::where('unique_token',$data['uniqueToken'])->first();

    	$match = Match::where('player_id',$player->id)->where('id',$data['matchId'])->first();
    	$match->points = --$match->points;
    	$match->save();

    	$result = array('status' => true,'message' => ''); 

    	return $result;
    }

    public function addExtraPoints(Request $request)
    {
    	$data = $request->all();

    	$player = Player::where('unique_token',$data['uniqueToken'])->first();

    	$match = Match::where('player_id',$player->id)->where('id',$data['matchId'])->first();

    	$reward = Reward::where('player_id',$player->id)->where('match_id',$data['matchId'])->first();

    	if($reward)
    	{
    		$reward->player_id = $player->id;
	    	$reward->match_id = $data['matchId'];
	    	if(isset($data['video']))
	    	{
				$reward->video = $data['video'];
				$match->points = $match->points + 50;
    			$match->save();
	    	}

	    	if(isset($data['share']))
	    	{
				$reward->share = $data['share'];
				$match->points = $match->points + 100;
    			$match->save();
	    	}

	    	if(isset($data['invitation']))
	    	{
				$reward->invitation = $data['invitation'];
				$match->points = $match->points + 100;
    			$match->save();
	    	}

	    	if(isset($data['instagramFollow']))
	    	{
				$reward->instagram_follow = $data['instagramFollow'];
				$match->points = $match->points + 50;
    			$match->save();
	    	}
	   		$reward->save();
    	}
    	else
    	{
    		$reward = new Reward;
	    	$reward->player_id = $player->id;
	    	$reward->match_id = $data['matchId'];
	    	if(isset($data['video']))
	    	{
				$reward->video = $data['video'];
				$match->points = $match->points + 50;
    			$match->save();
	    	}
	    	else
	    	{
	    		$reward->video = 0;
	    	}

	    	if(isset($data['share']))
	    	{
				$reward->share = $data['share'];
				$match->points = $match->points + 100;
    			$match->save();
	    	}
	    	else
	    	{
	    		$reward->share = 0;
	    	}

	    	if(isset($data['invitation']))
	    	{
				$reward->invitation = $data['invitation'];
				$match->points = $match->points + 100;
    			$match->save();
	    	}
	    	else
	    	{
	    		$reward->invitation = 0;
	    	}

	    	if(isset($data['instagramFollow']))
	    	{
				$reward->instagram_follow = $data['instagramFollow'];
				$match->points = $match->points + 50;
    			$match->save();
	    	}
	    	else
	    	{
	    		$reward->instagram_follow = 0;
	    	}
	   		$reward->save();
    	}

    	$result = array('status' => true,'message' => ''); 

    	return json_encode($result);
    }

    public function getExtraPoints(Request $request)
    {
    	$data = $request->all();

    	$player = Player::where('unique_token',$data['uniqueToken'])->first();

    	$reward = Reward::where('player_id',$player->id)->where('match_id',$data['matchId'])->first();

    	if($reward)
    	{
			$result = array('status' => true,'message' => '','video' => $reward->video,'share' => $reward->share,'invitation' => $reward->invitation,'instagram' => $reward->instagram_follow); 
    	}
    	else
  		{
  			$result = array('status' => false,'message' => ''); 
  		}

    	return json_encode($result);
    }

    public function sendInvitationEmail(Request $request)
    {
    	$data = $request->all();

    	if($data)
    	{
    		$firstName = explode(' ', getFullNameByToken($data['uniqueToken']));

    		$notificationData = array(
				'fromEmail' => 'postmaster@mailgun.swisswatchgallery.com.my',
				'fromName' => 'Time Kulture Revolution 2018',
				'toEmail' => $data['email'],
				'toName' => $data['email'],
				'introname' => $firstName[0],
				'intromessage' => getFullNameByToken($data['uniqueToken']) . ' has invited you to play Race Against Time - Time Kulture Revolution 2018',
				'content' => '',
				'uniqueToken' => $data['uniqueToken'],
				'matchId' => $data['matchId'],
			);

			$email = (new GeneralModel)->sentEmailNotification($notificationData,'emails.invitation');

			$player = Player::where('unique_token',$data['uniqueToken'])->first();

			$reward = Reward::where('player_id',$player->id)->where('match_id',$data['matchId'])->first();

	    	if($reward)
	    	{
	    		$reward->player_id = $player->id;
		    	$reward->match_id = $data['matchId'];
		    	if(isset($data['video']))
		    	{
					$reward->video = $data['video'];
		    	}

		    	if(isset($data['share']))
		    	{
					$reward->share = $data['share'];
		    	}

		    	if(isset($data['invitation']))
		    	{
					$reward->invitation = $data['invitation'];
		    	}

		    	if(isset($data['instagramFollow']))
		    	{
					$reward->instagram_follow = $data['instagramFollow'];
		    	}
		   		$reward->save();
	    	}
	    	else
	    	{
	    		$reward = new Reward;
		    	$reward->player_id = $player->id;
		    	$reward->match_id = $data['matchId'];
		    	if(isset($data['video']))
		    	{
					$reward->video = $data['video'];
		    	}
		    	else
		    	{
		    		$reward->video = 0;
		    	}

		    	if(isset($data['share']))
		    	{
					$reward->share = $data['share'];
		    	}
		    	else
		    	{
		    		$reward->share = 0;
		    	}

		    	if(isset($data['invitation']))
		    	{
					$reward->invitation = $data['invitation'];
		    	}
		    	else
		    	{
		    		$reward->invitation = 0;
		    	}

		    	if(isset($data['instagramFollow']))
		    	{
					$reward->instagram_follow = $data['instagramFollow'];
		    	}
		    	else
		    	{
		    		$reward->instagram_follow = 0;
		    	}
		   		$reward->save();
		   	}

			$result = array('status' => true,'message' => '');
    	}

    	return json_encode($result);
    }

    public function earnPoints($uniqueToken, $matchId)
    {
    	$player = Match::leftjoin('players','matches.player_id','=','players.id')->select('matches.id as id')->where('unique_token',$uniqueToken)->where('matches.id',$matchId)->first();

    	if ($player)
    	{
    		$match = Match::where('id',$player->id)->first();
    		$match->points = $match->points + 100;
    		$match->save();

    		return redirect('http://swisswatchgallery.com.my/raceagainsttime');
    	}

    	return redirect('http://swisswatchgallery.com.my/raceagainsttime'); 
    }

    public function getLivesByToken($token)
    {
    	$lives = (new Match)->getLivesByToken($token);

    	$result = array('status' => true,'message' => $lives);

    	return json_encode($result);
    }
}
