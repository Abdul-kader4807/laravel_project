<?php

use App\Http\Middleware\AdminMiddleWere;
use App\Http\Middleware\CashierMiddleware;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Middleware\ProviderMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin'=>AdminMiddleWere::class,
            'provider'=>ProviderMiddleware::class,
            'cashier'=>CashierMiddleware::class,
            'manager'=>ManagerMiddleware::class,

        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
