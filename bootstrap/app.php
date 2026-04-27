<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// 1. Simpan konfigurasi aplikasi ke variabel $app
$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_active' => \App\Http\Middleware\EnsureUserIsActive::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// 2. [PENTING] Tambahkan Baris Ini!
// Ini memberitahu Laravel bahwa folder public ada di ../public_html
$app->usePublicPath(dirname(__DIR__) . '/../public_html');

// 3. Return variabel $app
return $app;