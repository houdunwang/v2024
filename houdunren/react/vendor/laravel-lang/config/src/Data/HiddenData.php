<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use LaravelLang\Config\Data\Common\NonPushableData;
use LaravelLang\Config\Data\Common\PushableData;
use LaravelLang\Config\Data\Hidden\ModelsData;

class HiddenData
{
    public function __construct(
        public PushableData $plugins,
        public PushableData $packages,
        public NonPushableData $map,
        public ModelsData $models,
    ) {}
}
