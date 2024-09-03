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
use DragonCode\Support\Instances\Reflection as Helper;
use ReflectionClass;

/**
 * @method static array getConstants(object|string $class)
 * @method static bool isStaticMethod(object|ReflectionClass|string $class, string $method)
 * @method static ReflectionClass resolve(object|ReflectionClass|string $class)
 */
class Reflection extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
