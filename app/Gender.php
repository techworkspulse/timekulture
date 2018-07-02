<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function getAllGender()
    {   
        return Gender::all();
    }
}
