<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('is_admin')) {
    function is_admin()
    {
        return Auth::check() && Auth::user()->id == 1;
    }
}
