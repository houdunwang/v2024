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

namespace DragonCode\Support\Application;

use DragonCode\Support\Facades\Helpers\Str;

/**
 * @see https://www.php.net/manual/ru/reserved.constants.php
 */
class OS
{
    public function isUnix(): bool
    {
        return ! $this->isWindows() && ! $this->isUnknown();
    }

    public function isWindows(): bool
    {
        return $this->family() === 'windows';
    }

    public function isBSD(): bool
    {
        return $this->family() === 'bsd';
    }

    public function isDarwin(): bool
    {
        return $this->family() === 'darwin';
    }

    public function isSolaris(): bool
    {
        return $this->family() === 'solaris';
    }

    public function isLinux(): bool
    {
        return $this->family() === 'linux';
    }

    public function isUnknown(): bool
    {
        return $this->family() === 'unknown';
    }

    public function family(): string
    {
        return Str::lower(PHP_OS_FAMILY);
    }
}
