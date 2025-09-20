<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 'throttle:60,1' would be Global rate limit of 60/s, brute force ceiling
Route::middleware(['auth:sanctum', 'throttle:api'])->group(function(): void{
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

    // Prefixes

    Route::prefix('services')->as('services:')->group(base_path(
        path: 'routes/api/services.php'
    ))->middleware(['throttle:100,1']);

    Route::prefix('checks')->as('checks:')->group(base_path(
        path: 'routes/api/checks.php'
    ));
    Route::prefix('credentials')->as('credentials:')->group(base_path(
        path: 'routes/api/credentials.php'
    ));
});
