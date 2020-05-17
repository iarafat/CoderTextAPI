<?php

namespace App\Console;

use App\Console\Commands\LayersMakeCommand;
use App\Console\Commands\RepositoryInterfaceMakeCommand;
use App\Console\Commands\RepositoryMakeCommand;
use App\Console\Commands\ServiceInterfaceMakeCommand;
use App\Console\Commands\ServiceMakeCommand;
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
        RepositoryMakeCommand::class,
        RepositoryInterfaceMakeCommand::class,
        ServiceMakeCommand::class,
        ServiceInterfaceMakeCommand::class,
        LayersMakeCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
