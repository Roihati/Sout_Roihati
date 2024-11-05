<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      
        Schema::defaultStringLength(191); // Limite de 191 caractères pour éviter les erreurs de longueur de clé
    }
}
