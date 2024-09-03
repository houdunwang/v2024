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

declare(strict_types=1);

namespace DragonCode\Support\Facades\Application;

use DragonCode\Support\Application\Version as Helper;
use DragonCode\Support\Facades\Facade;

/**
 * @method static Helper of(string $version)
 */
class Version extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
