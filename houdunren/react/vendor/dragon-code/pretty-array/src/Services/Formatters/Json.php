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

class Json extends Base
{
    protected int $flags = JSON_UNESCAPED_SLASHES ^ JSON_PRETTY_PRINT ^ JSON_UNESCAPED_UNICODE;

    public function get(array $array, int $pad = 1): string
    {
        if (empty($array)) {
            return $this->encode($array);
        }

        $array = $this->convertKeysCase($array);

        return $this->encode($this->prepare($array));
    }

    protected function key(mixed $key, int $size = 0): string
    {
        return (string) $key;
    }

    protected function prepare(array $array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $key   = $this->key($key);
            $value = $this->value($value);

            match ($this->is_simple) {
                true  => $result[]     = $value,
                false => $result[$key] = $value
            };
        }

        return $result;
    }

    protected function value($value): mixed
    {
        if (! empty($value) && (is_array($value) || is_object($value))) {
            return $this->prepare($value);
        }

        return $value;
    }

    protected function encode(mixed $value): string
    {
        return json_encode($value, $this->flags);
    }
}
