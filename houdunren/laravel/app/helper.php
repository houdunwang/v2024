<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

function isAdministrator(User $user = null)
{
    $user = $user ?? Auth::user();
    return Auth::check() &&  $user->is_administrator;
}
