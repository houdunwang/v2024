<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class RouteNameData
{
    public function __construct(
        public string $parameter,
        public string $header,
        public string $cookie,
        public string $session,
        public string $column,
    ) {}
}
