<?php

/*
 * This file is part of the "dragon-code/pretty-array" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2023 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/pretty-array
 */

declare(strict_types=1);

namespace DragonCode\PrettyArray\Services\Formatters;

use DragonCode\Support\Facades\Helpers\Arr;

class Php extends Base
{
    protected bool $equals_align = false;

    protected int $pad_length = 4;

    protected string $line_break = PHP_EOL;

    public function setEqualsAlign(bool $equals): static
    {
        $this->equals_align = $equals;

        return $this;
    }

    public function get(array $array, int $pad = 1): string
    {
        if (empty($array)) {
            return '[]';
        }

        $array = $this->convertKeysCase($array);

        $keys_size  = $this->sizeKeys($array);
        $pad_length = $this->pad_length * $pad;

        $formatted = '[' . $this->line_break;

        foreach ($array as $key => $value) {
            $key   = $this->key($key, $keys_size);
            $value = $this->value($value, $pad + 1);

            $row = $this->is_simple
                ? "$value," . $this->line_break
                : "$key => $value," . $this->line_break;

            $formatted .= $this->pad($row, $pad_length);
        }

        return $formatted . $this->pad(']', $pad_length - $this->pad_length);
    }

    protected function key(mixed $key, int $size = 0): string
    {
        $key = $this->isStringKey($key) ? "'$key'" : $key;

        if (! $this->equals_align) {
            return (string) $key;
        }

        return $this->pad((string) $key, $this->keySizeCollision($key, $size), STR_PAD_RIGHT);
    }

    protected function value($value, int $pad = 1): mixed
    {
        if (! empty($value) && (is_array($value) || is_object($value))) {
            return $this->get($value, $pad);
        }

        return $this->castValue($value);
    }

    protected function sizeKeys(array $array): int
    {
        $sizes = Arr::of($array)->keys()->longestStringLength();

        return $this->key_as_string ? $sizes + 2 : $sizes;
    }

    protected function keySizeCollision($key, int $size): int
    {
        $collision = is_numeric($key) ? 0 : ($this->isAlignAndString() ? -2 : 0);

        return $size + $collision;
    }

    protected function isAlignAndString(): bool
    {
        return $this->equals_align && $this->key_as_string;
    }
}
