<?php

namespace DragonCode\Contracts\ApiResponse;

use DragonCode\Contracts\Support\Makeable;

interface Parseable extends Makeable
{
    public function setData($data): self;

    public function setWith(array $with = []): self;

    public function setStatusCode(?int $code = null): self;

    public function getStatusCode(): int;

    public function getData();

    public function getWith(): array;

    public function getType(): ?string;

    public function isError(): bool;
}
