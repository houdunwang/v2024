<?php

namespace App\Actions;

use App\Models\User;
use App\Notifications\SendValidateCode;
use Illuminate\Support\Facades\Cache;
use Lorisleiva\Actions\Concerns\AsAction;

class SendCodeAction
{
    use AsAction;
    protected string $key;

    public function handle(string $to)
    {
        $this->key = config('hd.code_prefix') . $to;
        $type = AccountFieldAction::run($to);
        $this->$type($to);
    }

    protected function cacheCode()
    {
        $code = fake()->numberBetween(1000, 9999);
        Cache::put($this->key, $code, 1200);
        return $code;
    }

    private function email(string $to)
    {
        RateLimiterAction::run($this->key, 1, config('hd.code_timeout', 20));
        $user = User::firstOrNew(['email' => $to]);
        $user->notify(new SendValidateCode($this->cacheCode()));
    }

    private function mobile(string $mobile) {}
}
