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

namespace DragonCode\Support\Facades\Instances;

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Instances\Instance as Helper;

/**
 * @method static bool exists(object|string $haystack)
 * @method static bool of(object|string $haystack, string|string[] $needles)
 * @method static string|null basename(object|string $class)
 * @method static string|null classname(object|string $class = null)
 */
class Instance extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
