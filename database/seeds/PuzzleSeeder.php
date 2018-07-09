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
                'name' => 'tudor',
	            'url' => './assets/img/tk-game/TUDOR.jpg',
	        ],
	        [
                'name' => 'tissot',
	            'url' => './assets/img/tk-game/tissot.jpg',
	        ],
	        [
                'name' => 'tag_heuer',
	            'url' => './assets/img/tk-game/TAG-Heuer.jpg',
	        ],
            [
                'name' => 'oris',
                'url' => './assets/img/tk-game/Oris.jpg',
            ],
            [
                'name' => 'maurince',
                'url' => './assets/img/tk-game/Maurice.jpg',
            ],
            [
                'name' => 'longines',
                'url' => './assets/img/tk-game/Longines.jpg',
            ],
            [
                'name' => 'graham',
                'url' => './assets/img/tk-game/Graham.jpg',
            ],
            [
                'name' => 'bell_ross',
                'url' => './assets/img/tk-game/Bell-Ross.jpg',
            ],
            [
                'name' => 'baume_mercier',
                'url' => './assets/img/tk-game/Baume-Mercier.jpg',
            ]
        ]);
    }
}
