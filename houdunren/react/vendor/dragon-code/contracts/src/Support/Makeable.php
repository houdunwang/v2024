<?php

declare(strict_types=1);

namespace DragonCode\Contracts\Support;

interface Makeable
{
    public static function make(...$parameters);
}
