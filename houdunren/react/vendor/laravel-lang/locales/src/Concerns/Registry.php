<?php

/**
 * This file is part of the "laravel-lang/locales" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2024 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

namespace LaravelLang\Locales\Concerns;

use Closure;
use LaravelLang\Locales\Services\Resolver;

trait Registry
{
    protected array $registry = [];

    protected function registry(array|string $key, Closure $callback): mixed
    {
        $key = $this->registryKey($key);

        return $this->registry[$key] ??= $callback();
    }

    protected function registryKey(array|string $key): string
    {
        return collect($key)
            ->map(static fn (mixed $item) => (string) Resolver::fromMixed($item))
            ->implode(':');
    }
}
