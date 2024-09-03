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

use DragonCode\Contracts\Pretty\Arr\Caseable;
use DragonCode\PrettyArray\Concerns\HasCases;
use DragonCode\PrettyArray\Concerns\HasCastable;
use DragonCode\Support\Concerns\Makeable;

abstract class Base implements Caseable
{
    use HasCases;
    use HasCastable;
    use Makeable;

    protected bool $key_as_string = false;

    protected bool $is_simple = false;

    abstract public function get(array $array, int $pad = 1): string;

    abstract protected function key(mixed $key, int $size = 0): string;

    public function setKeyAsString(bool $as): static
    {
        $this->key_as_string = $as;

        return $this;
    }

    public function setSimple(bool $simple): static
    {
        $this->is_simple = $simple;

        return $this;
    }

    protected function pad(string $value, int $pad = 1, $type = STR_PAD_LEFT): string
    {
        $pad += $type === STR_PAD_LEFT ? strlen($value) : 2;

        return str_pad($value, $pad, ' ', $type);
    }

    protected function isStringKey($key): bool
    {
        return $this->key_as_string || ! is_numeric($key);
    }
}
