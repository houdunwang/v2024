<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Middlewares;

use Illuminate\Http\Request;

class LocalizationByCookie extends Middleware
{
    protected function detect(Request $request): bool|float|int|string|null
    {
        return $request->cookie($this->names()->cookie);
    }
}
