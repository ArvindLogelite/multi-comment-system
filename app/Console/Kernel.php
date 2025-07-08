<?php

namespace App\Console;


use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\DeleteEmptyComments;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        DeleteEmptyComments::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('comments:delete-empty')->everyMinute();
    }
}
