<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

function isAdministrator(User $user = null)
{
    $user = $user ?? Auth::user();
    return Auth::check() &&  $user->is_administrator;
}
