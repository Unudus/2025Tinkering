<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

abstract class Controller
{
    protected function currentUser():User|null
    {
        return Auth::user();
    }

    protected function logger(string $msg, array $cnxt = []):void 
    {
        Log::info($msg, $cnxt);
    }
}
