<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->as('v1:')->group(function():void {
    Route::get('/', function(){
        return response()->json(request()->route());
    })->middleware('sunset: '.now());

    // 'throttle:60,1' would be Global rate limit of 60/s, brute force ceiling
    Route::middleware(['auth:sanctum', 'throttle:api'])->group(function(): void{
        Route::get('/user', function (Request $request) {
            return $request->user();
        })->name('user');

        // Prefixes

        Route::prefix('services')->as('services:')->group(base_path(
            path: 'routes/api/v1/services.php'
        ))->middleware(['throttle:100,1']);

        Route::prefix('checks')->as('checks:')->group(base_path(
            path: 'routes/api/v1/checks.php'
        ));
        Route::prefix('credentials')->as('credentials:')->group(base_path(
            path: 'routes/api/v1/credentials.php'
        ));
    });

});

Route::prefix('v2')->as('v2:')->group(function():void {
    // stub for new breaking changes
    Route::get('/', function(){
        return response()->json(request()->route());
    });
});