<?php

/*
 * This file is part of the "dragon-code/pretty-array" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2023 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/pretty-array
 */

namespace DragonCode\PrettyArray\Services;

use DragonCode\Support\Concerns\Makeable;
use DragonCode\Support\Facades\Filesystem\File as Storage;
use DragonCode\Support\Facades\Helpers\Str;
use DragonCode\Support\Facades\Tools\Stub;
use DragonCode\Support\Tools\Stub as StubTool;

/**
 * @method static File make(?string $content = null)
 */
class File
{
    use Makeable;

    public function __construct(
        protected ?string $content = null
    ) {
    }

    public function load(string $filename): array
    {
        return Storage::load($filename);
    }

    public function store(string $path, ?string $stub = null): void
    {
        Storage::store($path, $this->resolveContent($path, $stub));
    }

    protected function resolveContent(string $path, ?string $stub): string
    {
        return $this->content(
            $this->stub($stub, $path)
        );
    }

    protected function content(string $stub): string
    {
        return Stub::replace($stub, [
            '{{slot}}' => $this->content,
        ]);
    }

    protected function stub(?string $stub, string $path): string
    {
        if ($stub) {
            return $stub;
        }

        return $this->isJson($path) ? StubTool::JSON : StubTool::PHP_ARRAY;
    }

    protected function isJson(string $path): bool
    {
        return Str::of($path)->lower()->endsWith('.json');
    }
}
