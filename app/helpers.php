<?php
	function generateGenderRadio()
    {
        $gender = (new App\Gender)->getAllGender();

        $options = '<option value="" selected disabled>Gender</option>';
        foreach ($gender as $item) 
        {
            $options .= '<option value="'.$item->id.'">'.$item->name.'</option>';
        }
        return $options;
    }

    function getFullNameByToken($uniqueToken)
    {
        return (new App\Player)->getFullNameByToken($uniqueToken);
    }

    function getFullNameById($pid)
    {
        return (new App\Player)->getFullNameById($pid);
    }

    function getScoreboardNames()
    {
        return (new App\Match)->getScoreboardNames();
    }

    function getPastScoreboardNames()
    {
        return (new App\DailyWinner)->getPastScoreboardNames();
    }

    function getVideoURL()
    {
        return (new App\Video)->getVideoURL();
    }

    function getPuzzleNameByMatchId($mid)
    {
        return (new App\Match)->getPuzzleNameByMatchId($mid);
    }

    function getPuzzleURLByMatchId($mid)
    {
        return (new App\Match)->getPuzzleURLByMatchId($mid);
    }
?>