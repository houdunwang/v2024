<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Common;

use LaravelLang\Config\Concerns\HasValues;

class NonPushableData
{
    use HasValues;

    public function __construct(
        protected readonly string $key,
        protected readonly ?string $default = null
    ) {}

    public function all(): array
    {
        return $this->value($this->key, $this->default);
    }
}
