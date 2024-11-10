<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Définir les commandes artisan personnalisées à exécuter.
     * 
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Définir les tâches planifiées de l'application.
     */
    protected function schedule(Schedule $schedule)
    {
        // Exécute la vérification des stocks chaque jour
        $schedule->command('stock:check')->everyMinute();
    }

    protected $routeMiddleware = [
        // autres middlewares...
        'check404' => \App\Http\Middleware\Check404::class,
    ];
}
