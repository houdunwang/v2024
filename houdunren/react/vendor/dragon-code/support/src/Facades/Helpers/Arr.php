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

namespace DragonCode\Support\Facades\Helpers;

use ArrayAccess;
use ArrayObject;
use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Helpers\Ables\Arrayable;
use DragonCode\Support\Helpers\Arr as Helper;

/**
 * @method static Arrayable of(ArrayObject|array|null $value = [])
 * @method static Arrayable ofFile(string $path)
 * @method static array addUnique(array $array, mixed $values)
 * @method static array combine(...$arrays)
 * @method static array except(array $array, array|callable|string $keys)
 * @method static array filter($array, callable $callback = null, int $mode = 0)
 * @method static array flatten(array $array, bool $ignore_keys = true)
 * @method static array flattenKeys(mixed $array, string $delimiter = '.', ?string $prefix = null)
 * @method static array flip($array)
 * @method static array keys($array)
 * @method static array ksort(array $array, callable $callback = null)
 * @method static array map(array|ArrayAccess $array, callable $callback, bool $recursive = false)
 * @method static array mapInto(array $array, string $class)
 * @method static array merge(...$arrays)
 * @method static array only(array|ArrayAccess $array, array|callable|string $keys)
 * @method static array push(array|ArrayAccess $array, mixed ...$values)
 * @method static array remove(array|ArrayAccess $array, mixed $key)
 * @method static array renameKeys(array $array, callable $callback)
 * @method static array renameKeysMap(array $array, array $map)
 * @method static array resolve($value = null)
 * @method static array reverse(array $array, bool $preserve_keys = false)
 * @method static array set(array|ArrayAccess $array, array|mixed $key, mixed $value = null)
 * @method static array sort(array $array, callable $callback = null)
 * @method static array sortByKeys(array $array, array $sorter)
 * @method static array splice(array $array, int $offset, ?int $length = null, mixed $replacement = null)
 * @method static array tap(array|ArrayAccess $array, callable $callback)
 * @method static array unique(array $array, int $flags = SORT_STRING)
 * @method static array values($array)
 * @method static array wrap($value = null)
 * @method static bool doesntEmpty($value)
 * @method static bool doesntExist(array|ArrayAccess $array, $key)
 * @method static bool doesntExistWithoutDot(array|ArrayAccess $array, $key)
 * @method static bool exists(array|ArrayAccess $array, $key)
 * @method static bool existsWithoutDot(array|ArrayAccess $array, $key)
 * @method static bool isArrayable($value = null)
 * @method static bool isEmpty($value)
 * @method static int count(ArrayObject|array $array)
 * @method static int longestStringLength(array $array)
 * @method static mixed first(iterable $array, ?callable $callback = null, mixed $default = null)
 * @method static mixed get(array|ArrayAccess $array, $key, $default = null)
 * @method static mixed getKey(array|ArrayAccess $array, $key, $default = null)
 * @method static mixed last(array $array, ?callable $callback = null, mixed $default = null)
 */
class Arr extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
