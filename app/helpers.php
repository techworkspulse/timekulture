<?php
	function generateGenderRadio()
    {
        $gender = (new App\Gender)->getAllGender();

        $options = "";
        foreach ($gender as $item) 
        {
            $options .= '<input id="gender'.$item->id.'" name="gender" type="radio" value="'.$item->id.'" name="gender">'.$item->name;
        }
        return $options;
    }
?>