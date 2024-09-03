<?php

/*
 * This file is part of the "dragon-code/support" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2024 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/support
 */

namespace DragonCode\Support\Http;

use DragonCode\Contracts\Support\Stringable;
use DragonCode\Support\Concerns\Makeable;
use DragonCode\Support\Facades\Helpers\Str;

class BuilderPrepare implements Stringable
{
    use Makeable;

    protected string $of = '';

    protected string $prefix = '';

    protected string $suffix = '';

    protected string $default = '';

    public function __toString(): string
    {
        if (! empty($this->of)) {
            return (string) $this->prefixed();
        }

        return $this->default;
    }

    public function of(mixed $value): self
    {
        $this->of = (string) $value;

        return $this;
    }

    public function prefix(string $value): self
    {
        $this->prefix = $value;

        return $this;
    }

    public function suffix(string $value): self
    {
        $this->suffix = $value;

        return $this;
    }

    protected function prefixed(): ?string
    {
        return (string) Str::of($this->of)
            ->start($this->prefix)
            ->finish($this->suffix)
            ->trim();
    }
}
