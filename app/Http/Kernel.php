<?php

namespace Carpooler\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Carpooler\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Carpooler\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Carpooler\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Carpooler\Http\Middleware\Globals::class
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \Carpooler\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        'sentinel.auth' => \Carpooler\Http\Middleware\Sentinel\Authenticate::class,
        'sentinel.guest' => \Carpooler\Http\Middleware\Sentinel\RedirectIfAuthenticated::class,
        'sentinel.has-store' => \Carpooler\Http\Middleware\Sentinel\HasStore::class,

        'sentinel.roles.super-user' => \Carpooler\Http\Middleware\Sentinel\Roles\SuperUser::class,
        'sentinel.roles.admin' => \Carpooler\Http\Middleware\Sentinel\Roles\Admin::class,
        'sentinel.roles.dealer' => \Carpooler\Http\Middleware\Sentinel\Roles\Dealer::class,
        'sentinel.roles.customer' => \Carpooler\Http\Middleware\Sentinel\Roles\Customer::class
    ];
}
