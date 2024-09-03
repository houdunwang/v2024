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
use DragonCode\Support\Instances\Call as Helper;

/**
 * @method static mixed callback(mixed $callback, mixed ...$parameters)
 * @method static mixed run(mixed $class, string $method, ...$parameters)
 * @method static mixed runExists(mixed $class, string $method, ...$parameters)
 * @method static mixed runMethods($class, $methods, ...$parameters)
 * @method static mixed runOf(array $map, $value, ...$parameters)
 * @method static mixed value(mixed $callback, mixed $parameters = [])
 * @method static mixed when(bool $when, mixed $class, string $method, ...$parameters)
 */
class Call extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
