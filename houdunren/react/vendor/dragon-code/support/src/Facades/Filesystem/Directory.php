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

namespace DragonCode\Support\Facades\Filesystem;

use DirectoryIterator;
use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Filesystem\Directory as Helper;
use SplFileInfo;

/**
 * @method static array allPaths(string $path, ?callable $callback = null, bool $recursive = false)
 * @method static array names(string $path, callable|null $callback = null, bool $recursive = false)
 * @method static bool doesntExist(string $path)
 * @method static bool exists(string $path)
 * @method static bool isDirectory(DirectoryIterator|SplFileInfo|string $value)
 * @method static bool make(string $path, int $mode = 0755)
 * @method static DirectoryIterator|DirectoryIterator[] all(string $path)
 * @method static string validated(DirectoryIterator|SplFileInfo|string $path)
 * @method static void copy(string $source, string $target)
 * @method static void delete(array|string $path)
 * @method static void ensureDelete(array|string $path)
 * @method static void ensureDirectory(string $path, int $mode = 0755, bool $can_delete = false)
 * @method static void move(string $source, string $target)
 * @method static void validate(DirectoryIterator|SplFileInfo|string $path)
 */
class Directory extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
