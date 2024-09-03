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

namespace DragonCode\Support\Concerns;

use DragonCode\Support\Exceptions\ForbiddenVariableTypeException;
use DragonCode\Support\Facades\Helpers\Arr;
use DragonCode\Support\Facades\Helpers\Str;

trait Validation
{
    /**
     * @param  array|string  $needles
     */
    protected function validateType(mixed $haystack, mixed $needles): void
    {
        $type    = $this->validateGetType($haystack);
        $needles = $this->validateNeedles($needles);

        if (! Str::contains($type, $needles)) {
            throw new ForbiddenVariableTypeException($type, $needles);
        }
    }

    protected function validateNeedles(mixed $values): array
    {
        return Arr::map((array) $values, static fn ($value) => Str::lower($value));
    }

    protected function validateGetType($haystack): string
    {
        return Str::lower(gettype($haystack));
    }
}
