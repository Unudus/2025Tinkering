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
            callback: function() {return Limit::perMinutes(
                maxAttempts: 60,
                decayMinutes:1
            );}
        );

        RateLimiter::for(
            name: 'auth',
            callback: function() {return Limit::perMinutes(
                maxAttempts: 5,
                decayMinutes:1
            );}
        );
    }
}
