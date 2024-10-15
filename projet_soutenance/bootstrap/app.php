<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\FournisseurMiddleware;
use App\Http\Middleware\SupermarcheMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        /* $middleware->append(FournisseurMiddleware::class);
        $middleware->append(ClientMiddleware::class);
        $middleware->append(SupermarcheMiddleware::class); */

        $middleware->alias([
            'fournisseurMiddleware' => FournisseurMiddleware::class
        ]);
        $middleware->alias([
            'clientMiddleware' => ClientMiddleware::class
        ]);
        $middleware->alias([
            'suppermarcheMiddleware' => SupermarcheMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
