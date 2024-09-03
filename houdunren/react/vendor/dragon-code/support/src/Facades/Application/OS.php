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

namespace DragonCode\Support\Facades\Application;

use DragonCode\Support\Application\OS as Helper;
use DragonCode\Support\Facades\Facade;

/**
 * @method static bool isBSD()
 * @method static bool isDarwin()
 * @method static bool isLinux()
 * @method static bool isSolaris()
 * @method static bool isUnix()
 * @method static bool isUnknown()
 * @method static bool isWindows()
 * @method static string family()
 */
class OS extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
