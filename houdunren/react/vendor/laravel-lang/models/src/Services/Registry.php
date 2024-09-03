<?php

declare(strict_types=1);

namespace LaravelLang\Models\Services;

use Closure;

class Registry
{
    protected array $values = [];

    public function get(string $key, Closure $callback): mixed
    {
        return $this->values[$key] ?? $callback();
    }
}
