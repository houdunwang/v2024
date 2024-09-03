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

namespace DragonCode\PrettyArray\Concerns;

use DragonCode\Support\Facades\Helpers\Boolean;

trait HasCastable
{
    /**
     * Castable value.
     *
     * @param mixed|null $value
     *
     * @return string|int|float
     */
    protected function castValue(mixed $value = null): string|int|float
    {
        if (is_numeric($value)) {
            return $value;
        }

        if (is_bool($value)) {
            return Boolean::toString($value);
        }

        if (is_null($value)) {
            return 'null';
        }

        if (is_array($value) || is_object($value)) {
            return '[]';
        }

        return "'" . addslashes($value) . "'";
    }
}
