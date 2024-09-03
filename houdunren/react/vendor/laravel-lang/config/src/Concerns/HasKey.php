<?php

declare(strict_types=1);

namespace LaravelLang\Config\Concerns;

use BackedEnum;

trait HasKey
{
    protected function resolveKey(BackedEnum|int|string $key): int|string
    {
        if ($key instanceof BackedEnum) {
            return $key->value ?? $key->name;
        }

        return $key;
    }
}
