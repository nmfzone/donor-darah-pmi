<?php

namespace DonorDarahPMI\Console;

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
        \DonorDarahPMI\Console\Commands\Inspire::class,
        \DonorDarahPMI\Console\Commands\StorageCacheClear::class,
        \DonorDarahPMI\Console\Commands\StorageFresh::class,
        \DonorDarahPMI\Console\Commands\StorageLogsClear::class,
        \DonorDarahPMI\Console\Commands\StorageSessionClear::class,
        \DonorDarahPMI\Console\Commands\StorageViewsClear::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();
    }
}
