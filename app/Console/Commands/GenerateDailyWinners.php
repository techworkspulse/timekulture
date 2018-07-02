<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DailyWinner;

class GenerateDailyWinners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timekulture:generateDailyWinners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate 10 daily winners';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
    }
}
