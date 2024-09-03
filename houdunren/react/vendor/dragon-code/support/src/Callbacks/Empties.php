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

namespace DragonCode\Support\Callbacks;

class Empties
{
    public function notEmpty(): callable
    {
        return static fn ($value) => ! empty($value) || is_bool($value);
    }

    public function notEmptyBoth(): callable
    {
        return static fn ($value, $key) => (! empty($value) || is_bool($value)) && ! empty($key);
    }
}
