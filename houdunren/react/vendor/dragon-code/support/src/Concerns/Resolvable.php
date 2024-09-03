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

use DragonCode\Support\Facades\Instances\Call;

trait Resolvable
{
    protected static array $resolved = [];

    protected static function resolveInstance(object|string $instance, mixed ...$parameters): mixed
    {
        $class = self::resolveInstanceClass($instance);

        if (isset(self::$resolved[$class])) {
            return self::$resolved[$class];
        }

        return self::$resolved[$class] = is_object($instance) ? $instance : new $instance(...$parameters);
    }

    protected static function resolveCallback(string $value, callable $callback): mixed
    {
        $class = static::getSameClass();

        if (isset(static::$resolved[$class][$value])) {
            return static::$resolved[$class][$value];
        }

        return static::$resolved[$class][$value] = Call::callback($callback, $value);
    }

    protected static function resolveInstanceClass(object|string $instance): string
    {
        return is_object($instance) ? get_class($instance) : $instance;
    }

    protected static function getSameClass(): string
    {
        return static::class;
    }
}
