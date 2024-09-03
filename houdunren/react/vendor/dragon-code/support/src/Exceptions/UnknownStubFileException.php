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

namespace DragonCode\Support\Exceptions;

use Exception;

class UnknownStubFileException extends Exception
{
    public function __construct(?string $filename)
    {
        parent::__construct('Unknown stub file: "' . $filename . '"', 400);
    }
}
