<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared\Translators;

class TranslatorOptionsData
{
    public function __construct(
        public bool|string $preserveParameters
    ) {}
}
