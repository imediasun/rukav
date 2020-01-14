<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
		'App\Console\Commands\CurrencyCron',
		/* \App\Console\Commands\ChatServer::class,
		\App\Console\Commands\PushServer::class, */
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
	protected function schedule(Schedule $schedule)
	{
	
    /*  $schedule->call(function () {
	Log::info('Test schedule: '.date("Y-m-d H:i:s"));
    })->everyFiveMinutes(); */ 
	
	 $schedule->command('currency:cron')
               ->daily(); 
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
