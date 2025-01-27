<?php

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
    $middleware->web(remove: [
      \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ]);
    $middleware->web(append: [
      \CodeZero\LocalizedRoutes\Middleware\SetLocale::class,
      \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ]);
    $middleware->alias([
      'isAdminMiddleware' => App\Http\Middleware\isAdminMiddleware::class,

      /*         'SetLanguage' => App\Http\Middleware\SetLanguage::class,
              'localized' => App\Http\Middleware\Localized::class, */
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions) {
    //
  })->create();
