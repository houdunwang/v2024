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

namespace DragonCode\Support\Facades\Tools;

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Tools\Replace as Tool;

/**
 * @method static string toFormat(string $value, string $format = null)
 * @method static string toFormatArray(array $values, string $format = null)
 */
class Replace extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Tool::class;
    }
}
