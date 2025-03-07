<?php

use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Middleware\CustomerAuthMiddleware;
use App\Http\Middleware\ShareUserData;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'isAdminAuth' => AdminAuthMiddleware::class,
            'isSuperAdminAuth' => SuperAdminMiddleware::class,
            'isCustomerAuth' => CustomerAuthMiddleware::class,
            'shareUserNNotify' => ShareUserData::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
