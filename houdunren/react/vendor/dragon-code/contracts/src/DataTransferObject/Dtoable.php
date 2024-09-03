<?php

declare(strict_types=1);

namespace DragonCode\Contracts\DataTransferObject;

interface Dtoable
{
    public function dto(): DataTransferObject;
}
