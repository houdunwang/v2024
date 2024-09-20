<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GetUserByName
{
    use AsAction;

    public function handle(string $name)
    {
        return User::whereAny(['email', 'mobile', 'name'], $name)->first();
    }
}
