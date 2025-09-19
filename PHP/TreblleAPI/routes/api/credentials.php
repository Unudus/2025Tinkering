<?php 

use App\http\Controllers\Credentials;
use Illuminate\Support\Facades\Route;

Route::get('/', Credentials\IndexController::class)->name('index');
Route::post('/', Credentials\StoreController::class)->name('store');
Route::get('{credentials}', Credentials\ShowController::class)->name('show');
Route::put('{credentials}', Credentials\UpdateController::class)->name('update');
Route::delete('{credentials}', Credentials\DeleteController::class)->name('delete');