<?php

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
        $middleware->validateCsrfTokens(except: [

            'stripe/*',
            'http://127.0.0.1:8000/admin/brands/create',
            'http://127.0.0.1:8000/login',
            'http://127.0.0.1:8000/category-crate',
            'http://127.0.0.1:8000/logout',
            'http://127.0.0.1:8000/category-delete',
            'http://127.0.0.1:8000/category-update',
            'http://127.0.0.1:8000/category-by-id',
            'http://127.0.0.1:8000/admin/brands/create',
            'http://127.0.0.1:8000/brand-delete',
            'http://127.0.0.1:8000/brand-update',
            'http://127.0.0.1:8000/user-profile-update',
            'http://127.0.0.1:8000/product-create',
            'http://127.0.0.1:8000/product-update',
            'http://127.0.0.1:8000/product-by-id',
            'http://127.0.0.1:8000/product-delete',
            'http://127.0.0.1:8000/product-add-details',
            'http://127.0.0.1:8000/product-delete-details',
            'http://127.0.0.1:8000/product-update-details',
            'http://127.0.0.1:8000/customer-profile',
            'http://127.0.0.1:8000/product-review',
            'http://127.0.0.1:8000/addTo-cart',
            'http://127.0.0.1:8000/add-slider',

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

