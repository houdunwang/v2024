<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared\Translators;

/**
 * @property array<TranslatorData> $all
 * @property array<TranslatorData> $enabled
 */
class TranslatorChannelsData
{
    public function __construct(
        public array $all,
        public array $enabled,
    ) {}
}
