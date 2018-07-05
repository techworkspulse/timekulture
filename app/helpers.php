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
?>