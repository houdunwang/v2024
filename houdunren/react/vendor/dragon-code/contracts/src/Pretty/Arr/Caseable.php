<?php

namespace DragonCode\Contracts\Pretty\Arr;

interface Caseable
{
    public const CAMEL_CASE  = 1;
    public const KEBAB_CASE  = 3;
    public const NO_CASE     = 0;
    public const PASCAL_CASE = 4;
    public const SNAKE_CASE  = 2;

    public function setCase(int $type = self::NO_CASE): static;
}
