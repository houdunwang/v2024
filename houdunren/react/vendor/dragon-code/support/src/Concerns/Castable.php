<?php
/*
 * This file is part of the "dragon-code/support" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2024 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/support
 */

namespace DragonCode\Support\Concerns;

use DragonCode\Support\Facades\Helpers\Str;

/**
 * @property array $casts
 */
trait Castable
{
    protected function cast(array &$source)
    {
        foreach ($source as $key => &$value) {
            $value = $this->castValue($key, $value);
        }
    }

    protected function castValue(string $key, mixed $value)
    {
        $cast = $this->castKey($key);

        $method = $this->castMethodName($cast);

        return $this->{$method}($value);
    }

    protected function castKey(string $key): string
    {
        return $this->casts[$key] ?? 'default';
    }

    protected function castMethodName(string $key): string
    {
        return (string) Str::of($key)->start('castTo_')->camel();
    }

    protected function castToArray(mixed $value): array
    {
        if (empty($value)) {
            return [];
        }

        if (is_array($value)) {
            return $value;
        }

        parse_str($value, $output);

        return $output;
    }

    protected function castToInteger(mixed $value): ?int
    {
        return empty($value) && ! is_numeric($value) ? null : $value;
    }

    protected function castToString(?string $value): string
    {
        return (string) $value;
    }

    protected function castToDefault(mixed $value): mixed
    {
        return $value;
    }
}
