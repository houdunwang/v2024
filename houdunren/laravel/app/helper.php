<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

function isAdministrator(User $user = null)
{
    $user = $user ?? Auth::user();
    return Auth::check() &&  $user->is_administrator;
}

/**
 * 限流,多少秒可以发送几次
 *
 * @param string $key 限流的 key
 * @param Closure $callback 回调
 * @param integer $times 发送次数
 * @param integer $seconds 时间（秒）
 */
function rateLimiter(string $key, Closure $callback, int $times = 3, int $seconds = 20)
{
    $executed = RateLimiter::attempt($key, $times, $callback, $seconds);
    if (! $executed) {
        $seconds = RateLimiter::availableIn($key);
        abort(429, "请{$seconds}秒后再试");
    }
}
