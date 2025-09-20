<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class RateLimitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        RateLimiter::for(
            name: 'api',
            callback: function() {Limit::perMinutes(
                maxAttempts: 60
            )}
        );

        RateLimiter::for(
            name: 'auth',
            callback: function() {Limit::perMinutes(
                maxAttempts: 5
            )}
        );
    }
}
