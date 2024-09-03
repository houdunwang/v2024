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

namespace DragonCode\Support\Filesystem;

use DirectoryIterator;
use DragonCode\Support\Exceptions\DirectoryNotFoundException;
use DragonCode\Support\Exceptions\InvalidDestinationPathException;
use DragonCode\Support\Facades\Filesystem\File as FileHelper;
use DragonCode\Support\Facades\Helpers\Arr;
use DragonCode\Support\Facades\Helpers\Str;
use DragonCode\Support\Facades\Instances\Call;
use DragonCode\Support\Facades\Instances\Instance;
use FilesystemIterator;
use SplFileInfo;

class Directory
{
    /**
     * Get a list of files and folders in a directory.
     *
     * @throws DirectoryNotFoundException
     *
     * @return DirectoryIterator|array<DirectoryIterator>
     */
    public function all(string $path): DirectoryIterator
    {
        if ($this->doesntExist($path)) {
            throw new DirectoryNotFoundException($path);
        }

        return new DirectoryIterator($path);
    }

    /**
     * Get a list of directory paths.
     *
     * @throws DirectoryNotFoundException
     */
    public function allPaths(string $path, ?callable $callback = null, bool $recursive = false): array
    {
        $items = [];

        foreach ($this->all($path) as $directory) {
            if ($directory->isDir() && ! $directory->isDot()) {
                if (! is_callable($callback) || Call::callback($callback, $directory->getRealPath())) {
                    $items[] = $directory->getRealPath();
                }
            }

            if ($recursive && $directory->isDir() && ! $directory->isDot()) {
                $directories = $this->allPaths($directory->getRealPath(), $callback, $recursive);

                $items = array_merge($items, $directories);
            }
        }

        sort($items);

        return array_values($items);
    }

    /**
     * Get a list of directory names along a path.
     *
     * @throws DirectoryNotFoundException
     */
    public function names(string $path, ?callable $callback = null, bool $recursive = false): array
    {
        return Arr::of(
            $this->allPaths($path, $callback, $recursive)
        )
            ->map(fn (string $value) => Str::of($value)->after(realpath($path))->trim('\\/')->toString())
            ->toArray();
    }

    /**
     * Create a directory at the specified path.
     */
    public function make(string $path, int $mode = 0o755): bool
    {
        return ! $this->doesntExist($path) || mkdir($path, $mode, true);
    }

    /**
     * Copies directory.
     *
     * @throws DirectoryNotFoundException
     * @throws InvalidDestinationPathException
     */
    public function copy(string $source, string $target): void
    {
        $this->validate($source);
        $this->comparePaths($source, $target);
        $this->ensureDirectory($target);

        foreach (FileHelper::names($source, recursive: true) as $file) {
            FileHelper::copy(
                $source . '/' . $file,
                $target . '/' . $file
            );
        }
    }

    /**
     * Moving a directory to a new path.
     *
     * @throws DirectoryNotFoundException
     * @throws InvalidDestinationPathException
     */
    public function move(string $source, string $target): void
    {
        $this->copy($source, $target);

        $this->ensureDelete($source);
    }

    /**
     * Delete the directory with all contents in the specified path.
     *
     * @throws DirectoryNotFoundException
     */
    public function delete(array|string $paths): void
    {
        foreach ((array) $paths as $path) {
            if (! $this->isDirectory($path)) {
                throw new DirectoryNotFoundException($path);
            }

            $items = new FilesystemIterator($path);

            foreach ($items as $item) {
                $item->isDir() && ! $item->isLink()
                    ? $this->delete($item->getPathname())
                    : FileHelper::delete($item->getPathname());
            }

            @rmdir($path);
        }
    }

    /**
     * Ensure the directory has been deleted.
     *
     * @throws DirectoryNotFoundException
     */
    public function ensureDelete(array|string $paths): void
    {
        foreach ((array) $paths as $path) {
            $this->doesntExist($path) || $this->delete($path);
        }
    }

    /**
     * Ensure created directory exists.
     *
     * @throws DirectoryNotFoundException
     */
    public function ensureDirectory(string $path, int $mode = 0o755, bool $can_delete = false): void
    {
        if ($can_delete && $this->exists($path)) {
            $this->delete($path);
        }

        if ($this->doesntExist($path)) {
            $this->make($path, $mode);
        }
    }

    /**
     * Check if the directory exists.
     */
    public function exists(string $path): bool
    {
        return file_exists($path) && is_dir($path);
    }

    /**
     * Check if the directory doesn't exists.
     */
    public function doesntExist(string $path): bool
    {
        return ! $this->exists($path);
    }

    /**
     * Check if object or path is a directory.
     *
     * @param  DirectoryIterator|SplFileInfo|string  $value
     */
    public function isDirectory(mixed $value): bool
    {
        if (Instance::of($value, [SplFileInfo::class, DirectoryIterator::class])) {
            return $value->isDir();
        }

        return is_dir($value);
    }

    /**
     * Comparison of start and end paths.
     *
     * @throws InvalidDestinationPathException
     */
    public function comparePaths(string $path1, string $path2): void
    {
        if ($path1 === $path2 || realpath($path1) === realpath($path2)) {
            throw new InvalidDestinationPathException(realpath($path1));
        }
    }

    /**
     * Checks the existence of a directory.
     *
     * @param  DirectoryIterator|SplFileInfo|string  $path
     *
     * @throws DirectoryNotFoundException
     */
    public function validate(string $path): void
    {
        if (! $this->isDirectory($path)) {
            throw new DirectoryNotFoundException($path);
        }
    }

    /**
     * Checks the existence of a directory and return full path if exist.
     *
     * @param  DirectoryIterator|SplFileInfo|string  $path
     *
     * @throws DirectoryNotFoundException
     */
    public function validated(string $path): string
    {
        $this->validate($path);

        return realpath($path);
    }
}
