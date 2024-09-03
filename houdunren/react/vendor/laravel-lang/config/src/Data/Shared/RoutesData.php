<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class RoutesData
{
    public function __construct(
        public RouteNameData $names,
        public string $namePrefix,
        public bool $redirect,
    ) {}
}
