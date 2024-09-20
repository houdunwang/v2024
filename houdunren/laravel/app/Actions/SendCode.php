<?php

namespace App\Actions;

use App\Models\User;
use App\Notifications\SendValidateCode;
use Illuminate\Support\Facades\Cache;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\RateLimiter;

class SendCode
{
    use AsAction;
    protected User $user;
    protected string $code;
    protected string $key;

    public function handle(User $user)
    {
        $this->user = $user;
        $this->cacheCode();
        rateLimiter(
            $this->key,
            fn() =>
            $this->user->notify(new SendValidateCode($this->code))
        );
    }

    protected function cacheCode()
    {
        $this->code = $code = fake()->numberBetween(1000, 9999);
        $this->key = 'send-code:' . $this->user->id;
        Cache::put($this->key, $code, now()->addMinute(20));
    }
}
