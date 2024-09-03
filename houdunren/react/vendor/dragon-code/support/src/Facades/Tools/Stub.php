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
use DragonCode\Support\Tools\Stub as Tool;

/**
 * @method static string replace(string $stub_file, array $replace)
 * @method static string get(string $filename)
 */
class Stub extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Tool::class;
    }
}
