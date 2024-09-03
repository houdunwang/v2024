<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class ModelsData
{
    public function __construct(
        public string $suffix,
        public string $helpers,
        public ModelsFilterData $filter,
    ) {}
}
