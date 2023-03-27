<?php

namespace App\Console;

use App\Console\Commands\ClearTopDonate;
use App\Console\Commands\loadCharacters;
use App\Console\Commands\SendReqireFrendReward;
use App\Console\Commands\SendTopDonate;
use App\Console\Commands\StartGame;
use App\Console\Commands\VoteUpdate;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendTopDonate::class,
        ClearTopDonate::class,
        VoteUpdate::class,
        loadCharacters::class,
        SendReqireFrendReward::class,
        StartGame::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
