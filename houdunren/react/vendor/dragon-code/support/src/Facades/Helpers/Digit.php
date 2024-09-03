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
use DragonCode\Support\Helpers\Digit as Helper;

/**
 * @method static float rounded(float $number, int $length = 4, int $precision = 1)
 * @method static int factorial(int $n = 0)
 * @method static string toChars(int $number, string $chars = 'abcdefghijklmnopqrstuvwxyz')
 * @method static string toShort(float $number, int $precision = 1, ?string $suffix = null)
 * @method static string toString(float $value)
 */
class Digit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
