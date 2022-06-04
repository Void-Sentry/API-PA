<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Route::prefix('api')
            //     ->middleware('api')
            //     ->group(base_path('routes/api.php'));

            Route::prefix('api/auth')
                ->group(base_path('routes/api/auth/auth.php'));

            Route::prefix('api/notice')
                ->group(base_path('routes/api/notice/notice.php'));

            Route::prefix('api/role')
  // s             ->middleware(['auth:sanctum', 'ability:diretor,dev'])
                ->group(base_path('routes/api/role/role.php'));
            
            Route::prefix('api/status')
                ->group(base_path('routes/api/status/status.php'));
            
            Route::prefix('api/user')
                ->middleware(['auth:sanctum', 'ability:diretor,dev'])
                ->group(base_path('routes/api/user/user.php'));

            // Route::middleware('web')
            //     ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
