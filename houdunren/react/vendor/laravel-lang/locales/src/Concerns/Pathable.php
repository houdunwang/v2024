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

use DragonCode\Support\Facades\Filesystem\Directory;
use DragonCode\Support\Facades\Filesystem\File;
use Illuminate\Support\Collection;

trait Pathable
{
    protected function directoryExists(): bool
    {
        return Directory::exists(lang_path());
    }

    protected function directoryDoesntExist(): bool
    {
        return ! $this->directoryExists();
    }

    protected function directories(string $path = ''): array
    {
        return collect(Directory::names(lang_path($path)))
            ->when(
                fn (Collection $items) => $items->contains('vendor'),
                fn (Collection $items) => $items->merge(
                    collect($this->directories('vendor'))->map(
                        fn (string $folder) => $this->directories('vendor/' . $folder)
                    )
                )
            )
            ->flatten()
            ->all();
    }

    protected function jsons(): array
    {
        return File::names(lang_path(), recursive: true);
    }
}
