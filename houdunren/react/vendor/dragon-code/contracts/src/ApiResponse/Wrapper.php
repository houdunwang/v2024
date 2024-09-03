<?php

namespace DragonCode\Contracts\ApiResponse;

use DragonCode\Contracts\Support\Makeable;

interface Wrapper extends Makeable
{
    public function wrap(bool $wrap = true): self;

    public function allowWith(bool $allow = true): self;

    public function parser(Parseable $parser): self;

    public function resolver(Resolver $resolver): self;

    public function statusCode(): int;

    public function get();
}
