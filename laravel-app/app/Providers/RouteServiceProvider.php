<?php

namespace App\Providers;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            /* Movie Routes */
            Route::get('/api/movie/{id}', [MovieController::class, 'get']);
            Route::post('/api/movie', [MovieController::class, 'create']);
            Route::patch('/api/movie', [MovieController::class, 'update']);
            Route::delete('/api/movie/{id}', [MovieController::class, 'delete']);
            Route::get('/api/movies', [MovieController::class, 'show']);

            /* Auth Routes */
            Route::post('/api/register', [AuthController::class, 'register']);
            Route::post('/api/login', [AuthController::class, 'login']);
            Route::get('/api/get-user-id/{token}', [AuthController::class, 'get_user_id_from_token']);
        });
    }
}
