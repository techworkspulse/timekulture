<?php

use Illuminate\Database\Seeder;

class PuzzleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puzzles')->insert([
        	[
	            'url' => 'http://localhost:82/assets/img/BR-square.png',
	        ],
	        [
	            'url' => 'http://localhost:82/assets/img/Tissot-Squar.png',
	        ],
	        [
	            'url' => 'http://localhost:82/assets/img/Tudor-Square.png',
	        ]
        ]);
    }
}
