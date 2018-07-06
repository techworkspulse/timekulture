<?php

use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->insert([
        	[
	            'url' => 'https://www.youtube.com/embed/a5cIxDW2WSo',
	        ],
	        [
	            'url' => 'https://www.youtube.com/embed/Uv19muJLo-A',
	        ],
	        [
	            'url' => 'https://www.youtube.com/embed/3YBQjfJ3h9Y',
	        ],
            [
                'url' => 'https://www.youtube.com/embed/iq609ZD7Z6I',
            ],
            [
                'url' => 'https://www.youtube.com/embed/Z3HjYzStPo0',
            ],
            [
                'url' => 'https://www.youtube.com/embed/8sn9LDRoBRo',
            ],
            [
                'url' => 'https://www.youtube.com/embed/W1d_-IKxcvE',
            ]
        ]);
    }
}
