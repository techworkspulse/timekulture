<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Player;
use App\Match;
use App\MatchLog;

class GeneralController extends Controller
{
	public function registration()
	{
		return view('register');
	}

	public function game()
	{
		return view('game');
	}

	protected function createPlayerValidator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|string|max:50',
			'gender' => 'required',
			'phoneNumber' => 'required|digits_between:9,13',
			'email' => 'required|email',
			'icNumber' => 'required|digits:12',
		]);
	}

    public function createPlayer(Request $request)
    {
    	$uniqueToken = md5(uniqid(rand(), true));

    	$data = $request->all();

        $validator = $this->createPlayerValidator($data);
        if ($validator->fails()) 
        {
            $result = array('status' => false, 'message' => $validator->errors()->first(), 'code' => '');
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
		        	$player->phone = $data['phoneNumber'];
		        	$player->email = $data['email'];
		        	$player->ic_number = $data['icNumber'];
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
	        	$player->phone = $data['phoneNumber'];
	        	$player->email = $data['email'];
	        	$player->ic_number = $data['icNumber'];
	        	$player->live_count = 3;
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
	    		$random = rand(0,2);
	    		$match = Match::where('player_id',$player->id)->where('puzzle_id',$random)->count();
	    	}
	    	while($match != 0);
    	}
    	else
    	{
    		return false;
    	}

    	return $random;
    }

    public function storeMatchLog(Request $request)
    {
    	$data = $request->all();

    	$player = Player::where('unique_token', $data['uniqueToken'])->first();

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

    	$player = Player::where('unique_token', $data['uniqueToken'])->first();

    	$match = Match::where('player_id',$player->id)->where('id',$data['matchId'])->first();
    	$match->points = --$match->points;
    	$match->save();

    	$result = array('status' => true,'message' => ''); 

    	return $result;
    }
}
