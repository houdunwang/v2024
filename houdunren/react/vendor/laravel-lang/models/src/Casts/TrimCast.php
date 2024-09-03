<?php

declare(strict_types=1);

namespace LaravelLang\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

use function is_bool;
use function is_null;
use function is_numeric;
use function trim;

class TrimCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (is_bool($value) || is_numeric($value) || is_null($value)) {
            return $value;
        }

        if ($value = trim((string) $value)) {
            return $value;
        }

        return null;
    }
}
