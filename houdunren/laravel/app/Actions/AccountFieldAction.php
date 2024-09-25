<?php

namespace App\Actions;

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class AccountFieldAction
{
    use AsAction;

    public function handle(string $name)
    {
        if (preg_match('/^\w+@[\w\.]+$/', $name)) {
            return 'email';
        }
        if (preg_match('/1\d{10}/', $name)) {
            return 'mobile';
        }
        abort(400, '帐号格式错误');
    }
}
