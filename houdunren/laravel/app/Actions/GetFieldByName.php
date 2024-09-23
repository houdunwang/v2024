<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class GetFieldByName
{
    use AsAction;

    public function handle(string $account)
    {
        return preg_match('/.*@.*/', $account) ? 'email' : "mobile";
    }
}
