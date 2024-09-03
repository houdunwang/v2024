<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use LaravelLang\Config\Data\Common\NonPushableData;
use LaravelLang\Config\Data\Shared\ModelsData;
use LaravelLang\Config\Data\Shared\RoutesData;
use LaravelLang\Config\Data\Shared\SmartPunctuationData;
use LaravelLang\Config\Data\Shared\TranslatorsData;

class SharedData
{
    public function __construct(
        public bool $inline,
        public bool $align,
        public NonPushableData $aliases,
        public SmartPunctuationData $punctuation,
        public RoutesData $routes,
        public ModelsData $models,
        public TranslatorsData $translators,
    ) {}
}
