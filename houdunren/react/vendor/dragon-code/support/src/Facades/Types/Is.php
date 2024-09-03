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

namespace DragonCode\Support\Facades\Types;

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Types\Is as Helper;

/**
 * @method static bool boolean($value)
 * @method static bool contract($value)
 * @method static bool doesntEmpty($value)
 * @method static bool error($value)
 * @method static bool isEmpty($value)
 * @method static bool object($value)
 * @method static bool reflectionClass($value)
 * @method static bool string($value)
 */
class Is extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
