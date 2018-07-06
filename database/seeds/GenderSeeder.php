<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
        	[
	            'name' => 'Male',
	        ],
	        [
	            'name' => 'Female',
	        ]
        ]);
    }
}
