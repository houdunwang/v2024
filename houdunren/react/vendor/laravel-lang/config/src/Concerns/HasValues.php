<?php

declare(strict_types=1);

namespace LaravelLang\Config\Concerns;

use BackedEnum;

use function config;

trait HasValues
{
    use HasKey;

    public function get(BackedEnum|int|string $key): mixed
    {
        $key = $this->resolveKey($key);

        $main    = $this->key . '.' . $key;
        $default = $this->default ? $this->default . '.' . $key : null;

        if ($this->default) {
            return $this->value($main, $default) ?? $this->value($this->default);
        }

        return $this->value($main, $default);
    }

    protected function value(string $key, ?string $default = null): mixed
    {
        if ($default) {
            return config($key) ?: config($default);
        }

        return config($key);
    }
}
