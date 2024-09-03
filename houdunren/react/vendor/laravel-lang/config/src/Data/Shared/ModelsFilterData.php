<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class ModelsFilterData
{
    public function __construct(
        public bool $enabled,
    ) {}
}
