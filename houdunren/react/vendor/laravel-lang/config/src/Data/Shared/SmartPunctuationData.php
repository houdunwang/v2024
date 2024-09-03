<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use LaravelLang\Config\Data\Common\NonPushableData;

class SmartPunctuationData
{
    public function __construct(
        public bool $enabled,
        public array $common,
        public NonPushableData $locales,
    ) {}
}
