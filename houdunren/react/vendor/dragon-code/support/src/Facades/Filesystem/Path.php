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

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Filesystem\Path as Helper;

/**
 * @method static string basename(string $path)
 * @method static string dirname(string $path)
 * @method static string extension(string $path)
 * @method static string filename(string $path)
 */
class Path extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
