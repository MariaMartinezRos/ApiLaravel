<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
//use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if($this->app->environment('local')){
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
//            $this->app->register(TelescopeServiceProvider::class); CUIDADO CON ESTO, CLASSES DIFERENTES
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('products', function ($request) {
//            return Limit::perMinute(6)->by(($request->user())->id ?: $request->ip());
            return $request->user()?->role === 'admin'
                ? Limit::none()
                : Limit::perMinute(5)->by($request->user()?->id ?: $request->ip());
        });
    }
}
