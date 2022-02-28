<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\ScheduleMail::class,
        Commands\TrialDay::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('schedule:mail')->dailyAt('09:00')->timezone('Asia/Hong_Kong');
        $schedule->command('trialday:cron')->dailyAt('09:00')->timezone('Asia/Hong_Kong');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
