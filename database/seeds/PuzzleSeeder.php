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
	            'url' => './assets/img/tk-game/TUDOR.jpg',
	        ],
	        [
	            'url' => './assets/img/tk-game/tissot.jpg',
	        ],
	        [
	            'url' => './assets/img/tk-game/TAG-Heuer.jpg',
	        ],
            [
                'url' => './assets/img/tk-game/Oris.jpg',
            ],
            [
                'url' => './assets/img/tk-game/Maurice.jpg',
            ],
            [
                'url' => './assets/img/tk-game/Longines.jpg',
            ],
            [
                'url' => './assets/img/tk-game/Graham.jpg',
            ],
            [
                'url' => './assets/img/tk-game/Bell-Ross.jpg',
            ],
            [
                'url' => './assets/img/tk-game/Baume-Mercier.jpg',
            ]
        ]);
    }
}
