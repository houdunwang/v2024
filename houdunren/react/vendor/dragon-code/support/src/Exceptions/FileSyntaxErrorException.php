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

namespace DragonCode\Support\Exceptions;

use ParseError;

class FileSyntaxErrorException extends ParseError
{
    public function __construct(string $filename)
    {
        $path = realpath($filename);

        parent::__construct("File \"$path\" has an incorrect structure or is corrupted.");
    }
}
