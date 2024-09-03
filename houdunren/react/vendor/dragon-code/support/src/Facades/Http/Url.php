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

namespace DragonCode\Support\Facades\Http;

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Http\Url as Helper;

/**
 * @method static \DragonCode\Support\Http\Builder parse(\DragonCode\Contracts\Http\Builder|string|null $url)
 * @method static bool exists(\DragonCode\Contracts\Http\Builder|string|null $url)
 * @method static bool is(\DragonCode\Contracts\Http\Builder|string|null $url)
 * @method static \DragonCode\Support\Http\Builder|\DragonCode\Contracts\Http\Builder|string validated(\DragonCode\Contracts\Http\Builder|string|null $url)
 * @method static string|null default(\DragonCode\Contracts\Http\Builder|string|null $url, \DragonCode\Contracts\Http\Builder|string|null $default)
 * @method static void validate(\DragonCode\Contracts\Http\Builder|string|null $url)
 */
class Url extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
