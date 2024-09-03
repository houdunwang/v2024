<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Hidden;

class ModelsData
{
    public function __construct(
        public array|string $directory
    ) {}
}
