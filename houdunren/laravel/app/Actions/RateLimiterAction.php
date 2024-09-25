<?php

namespace App\Actions;

namespace App\Actions;

use Illuminate\Support\Facades\RateLimiter;
use Lorisleiva\Actions\Concerns\AsAction;

class RateLimiterAction
{
    use AsAction;

    public function handle(string $key,  int $times = 1, int $seconds = 20)
    {
        $cacheKey = 'rate_limiter:' . $key;
        $executed = RateLimiter::attempt($cacheKey, $times, fn() => true, $seconds);
        if (! $executed) {
            $seconds = RateLimiter::availableIn($cacheKey);
            abort(429, "请{$seconds}秒后再试");
        }
    }
}
