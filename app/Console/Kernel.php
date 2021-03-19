<?php

namespace App\Console;

use App\Console\Commands\SendEmailVerificationReminderCommand;
use App\Console\Commands\SendNewsletterCommand;
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
        SendNewsletterCommand::class,
        SendEmailVerificationReminderCommand::class,
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
            ->evenInMaintenanceMode() //! Para que se ejecute aun cuando la app este en modo de mantenimiento
            ->sendOutputTo(storage_path('inspire.log'))
            ->everyMinute();

        $schedule->call(function(){
            echo "Hola";
        })->everyFiveMinutes();

        $schedule->command( SendNewsletterCommand::class )
            ->withoutOverlapping() //! Evita la superposicion de tareas.
            ->onOneServer() //! Se ejecute en un solo servidor
            ->mondays();

        $schedule->command( SendEmailVerificationReminderCommand::class )
            ->onOneServer() //! Se ejecute en un solo servidor
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
