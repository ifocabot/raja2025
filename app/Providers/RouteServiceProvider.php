<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->prefix('master/assets')
                ->middleware('auth')
                ->group(base_path('routes/master/asset-management.php'));

            Route::middleware('web')
                ->prefix('master/core')
                ->middleware('auth')
                ->group(base_path('routes/master/core.php'));
        });
    }

}
