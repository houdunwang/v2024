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

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Helpers\Boolean as Helper;

/**
 * @method static bool isFalse($value)
 * @method static bool isTrue($value)
 * @method static bool to($value)
 * @method static bool|null parse($value)
 * @method static string toString(bool $value)
 */
class Boolean extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
