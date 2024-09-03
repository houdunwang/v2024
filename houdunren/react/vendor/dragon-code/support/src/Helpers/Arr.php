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

namespace DragonCode\Support\Helpers;

use ArrayAccess;
use ArrayObject;
use Closure;
use DragonCode\Contracts\Support\Arrayable;
use DragonCode\Support\Facades\Callbacks\Empties;
use DragonCode\Support\Facades\Callbacks\Sorter;
use DragonCode\Support\Facades\Filesystem\File;
use DragonCode\Support\Facades\Instances\Call;
use DragonCode\Support\Facades\Instances\Instance as InstanceHelper;
use DragonCode\Support\Facades\Instances\Reflection as ReflectionHelper;
use DragonCode\Support\Helpers\Ables\Arrayable as ArrayableHelper;
use Illuminate\Contracts\Support\Arrayable as ArrayableIlluminate;

class Arr
{
    /**
     * Get a new arrayable object from the given array.
     */
    public function of(array|ArrayObject|null $value = []): ArrayableHelper
    {
        return new ArrayableHelper($value);
    }

    /**
     * Get a new arrayable object from the given array from the php or json array file.
     */
    public function ofFile(string $path): ArrayableHelper
    {
        $content = File::load($path);

        return $this->of($content);
    }

    /**
     * Renaming array keys.
     * As the second parameter, a callback function is passed, which determines the actions for processing the value.
     * The output of the function must be a string with a name.
     *
     * @param  ArrayObject|array|null  $array  $array
     */
    public function renameKeys(array|ArrayObject|null $array, callable $callback): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $new = Call::callback($callback, $key, $value);

            $result[$new] = $value;
        }

        return $result;
    }

    /**
     * Renaming array keys with map.
     *
     * @param  ArrayObject|array|null  $array  $array
     */
    public function renameKeysMap(array|ArrayObject|null $array, array $map): array
    {
        return $this->renameKeys($array, static fn ($key) => $map[$key] ?? $key);
    }

    /**
     * Get the size of the longest text element of the array.
     *
     * @param  ArrayObject|array|null  $array  $array
     */
    public function longestStringLength(array|ArrayObject|null $array): int
    {
        return ! empty($array) ? max(array_map('mb_strlen', $array)) : 0;
    }

    /**
     * Push one a unique element onto the end of array.
     *
     * @param  ArrayObject|array  $array  $array
     */
    public function addUnique(array|ArrayObject $array, mixed $values): array
    {
        if ($this->isArrayable($values)) {
            foreach ($values as $value) {
                $array = $this->addUnique($array, $value);
            }
        }
        else {
            $array[] = $values;
        }

        return $this->unique($array);
    }

    /**
     * Removes duplicate values from an array.
     *
     * Sorting type flags:
     *   SORT_REGULAR       - compare items normally
     *   SORT_NUMERIC       - compare items numerically
     *   SORT_STRING        - compare items as strings
     *   SORT_LOCALE_STRING - compare items as strings, based on the current locale
     *
     * @see https://php.net/manual/en/function.array-unique.php
     *
     * @param  ArrayObject|array  $array  $array
     */
    public function unique(array|ArrayObject $array, int $flags = SORT_STRING): array
    {
        return array_unique($array, $flags);
    }

    /**
     * Sort an associative array in the order specified by an array of keys.
     *
     * Example:
     *
     *  $arr = ['q' => 1, 'r' => 2, 's' => 5, 'w' => 123];
     *
     *  Arr::sortByKeys($arr, ['q', 'w', 'e']);
     *
     * print_r($arr);
     *
     *   Array
     *   (
     *     [q] => 1
     *     [w] => 123
     *     [r] => 2
     *     [s] => 5
     *   )
     *
     * @see https://gist.github.com/Ellrion/a3145621f936aa9416f4c04987533d8d#file-helper-php
     *
     * @param  ArrayObject|array  $array  $array
     */
    public function sortByKeys(array|ArrayObject $array, array $sorter): array
    {
        $sorter = array_intersect($sorter, array_keys($array));

        return array_merge(array_flip($sorter), $array);
    }

    /**
     * Recursively sorting an array by values.
     *
     * @param  ArrayObject|array  $array  $array
     */
    public function sort(array|ArrayObject $array, ?callable $callback = null): array
    {
        $callback = $callback ?: Sorter::default();

        usort($array, $callback);

        foreach ($array as &$value) {
            if (is_array($value)) {
                $value = $this->sort($value, $callback);
            }
        }

        return $array;
    }

    /**
     * Recursively sorting an array by keys.
     *
     * @param  ArrayObject|array  $array  $array
     */
    public function ksort(array|ArrayObject $array, ?callable $callback = null): array
    {
        $callback = $callback ?: Sorter::default();

        uksort($array, $callback);

        foreach ($array as &$value) {
            if (is_array($value)) {
                $value = $this->ksort($value, $callback);
            }
        }

        return $array;
    }

    /**
     * Merge one or more arrays recursively.
     * Don't forget that numeric keys NOT will be renumbered!
     *
     * @param  array<array>  ...$arrays
     */
    public function merge(array|ArrayObject ...$arrays): array
    {
        $result = [];

        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $prev_value = $result[$key] ?? [];

                    if (gettype($prev_value) !== 'array') {
                        $prev_value = [];
                    }

                    $value = $this->merge($prev_value, $value);
                }

                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * Combining arrays without preserving keys.
     *
     * @param  array  ...$arrays
     */
    public function combine(array|ArrayObject ...$arrays): array
    {
        $result = [];

        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (is_array($value) && (! is_numeric($key) || ! isset($result[$key]))) {
                    $prev_value = $result[$key] ?? [];

                    if (gettype($prev_value) !== 'array') {
                        $prev_value = [];
                    }

                    $result[$key] = $this->combine($prev_value, $value);

                    continue;
                }

                if (is_array($value)) {
                    $value = $this->combine($value);
                }

                $result[] = $value;
            }
        }

        return $result;
    }

    /**
     * If the given value is not an array and not null, wrap it in one.
     */
    public function wrap(mixed $value = null): array
    {
        if (is_array($value)) {
            return $value;
        }

        return ! empty($value) ? [$value] : [];
    }

    /**
     * Get the instance as an array.
     */
    public function resolve(mixed $value): array
    {
        if (InstanceHelper::of($value, [ArrayObject::class, ArrayableHelper::class])) {
            $value = Call::runMethods($value, ['getArrayCopy', 'resolve', 'toArray']);
        }

        if (is_object($value)) {
            $value = method_exists($value, 'toArray') ? $value->toArray() : get_object_vars($value);
        }

        $array = $this->wrap($value);

        foreach ($array as &$item) {
            $item = $this->isArrayable($item) ? $this->resolve($item) : $item;
        }

        return $array;
    }

    /**
     * Determine if the given key exists in the provided array.
     *
     * @param  ArrayAccess|\DragonCode\Contracts\Support\Arrayable|\Illuminate\Contracts\Support\Arrayable|array  $array  |\ArrayAccess
     *     $array
     */
    public function exists(mixed $array, mixed $key): bool
    {
        if ($this->existsWithoutDot($array, $key)) {
            return true;
        }

        if (! str_contains($key, '.')) {
            return $this->existsWithoutDot($array, $key);
        }

        foreach (explode('.', $key) as $segment) {
            if ($this->isArrayable($array) && $this->exists($array, $segment)) {
                $array = $array[$segment];
            }
            else {
                return false;
            }
        }

        return true;
    }

    /**
     * Determine if the given key doesn't exist in the provided array.
     *
     * @param  ArrayAccess|\DragonCode\Contracts\Support\Arrayable|\Illuminate\Contracts\Support\Arrayable|array  $array
     */
    public function doesntExist(mixed $array, mixed $key): bool
    {
        return ! $this->exists($array, $key);
    }

    /**
     * Determine if the given key exists in the provided array without dot divider.
     *
     * @param  ArrayAccess|\DragonCode\Contracts\Support\Arrayable|\Illuminate\Contracts\Support\Arrayable|array  $array  |\ArrayAccess
     *     $array
     */
    public function existsWithoutDot(mixed $array, mixed $key): bool
    {
        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }

    /**
     * Determine if the given key doesn't exist in the provided array without dot divider.
     *
     * @param  ArrayAccess|\DragonCode\Contracts\Support\Arrayable|\Illuminate\Contracts\Support\Arrayable|array  $array  |\ArrayAccess
     *     $array
     */
    public function doesntExistWithoutDot(mixed $array, mixed $key): bool
    {
        return ! $this->existsWithoutDot($array, $key);
    }

    /**
     * Get an item from an array.
     *
     * @see https://github.com/illuminate/collections/blob/master/Arr.php
     *
     * @param  ArrayAccess|\DragonCode\Contracts\Support\Arrayable|\Illuminate\Contracts\Support\Arrayable|array  $array  |ArrayAccess
     *     $array
     *
     * @return mixed|null
     */
    public function get(mixed $array, mixed $key, mixed $default = null): mixed
    {
        if (! $this->isArrayable($array)) {
            return Call::value($default);
        }

        if (is_null($key)) {
            return $array;
        }

        if ($this->existsWithoutDot($array, $key)) {
            return $array[$key];
        }

        if (! str_contains((string) $key, '.')) {
            return $array[$key] ?? Call::value($default);
        }

        foreach (explode('.', $key) as $segment) {
            if ($this->isArrayable($array) && $this->existsWithoutDot($array, $segment)) {
                $array = $array[$segment];
            }
            else {
                return Call::value($default);
            }
        }

        return $array;
    }

    /**
     * If the element key exists, then return the name of the key, otherwise the default value.
     *
     * @param  array|ArrayAccess  $array
     *
     * @return mixed|null
     */
    public function getKey(mixed $array, mixed $key, mixed $default = null): mixed
    {
        return $this->exists($array, $key) ? $key : $default;
    }

    /**
     * Get all of the given array except for a specified array of keys.
     *
     * @param  array|ArrayAccess  $array
     * @param  array|callable|string  $keys
     */
    public function except(mixed $array, mixed $keys): array
    {
        $callback = is_callable($keys)
            ? $keys
            : static fn ($key) => empty($keys) || ! in_array($key, (array) $keys);

        return $this->filter((array) $array, $callback, ARRAY_FILTER_USE_KEY);
    }

    /**
     * Get a subset of the items from the given array.
     *
     * @param  array|ArrayAccess  $array
     * @param  array|callable|string  $keys
     */
    public function only(mixed $array, mixed $keys): array
    {
        if (is_callable($keys)) {
            return $this->filter($array, $keys, ARRAY_FILTER_USE_KEY);
        }

        $result = [];

        foreach ((array) $keys as $index => $key) {
            if (is_array($key) && isset($array[$index])) {
                $result[$index] = $this->only($array[$index], $key);
            }
            elseif (is_array($key) && ! isset($array[$index])) {
                continue;
            }
            elseif (isset($array[$key])) {
                $result[$key] = $array[$key];
            }
        }

        return $result;
    }

    /**
     * Iterates over each value in the <b>array</b> passing them to the <b>callback</b> function.
     * If the <b>callback</b> function returns true, the current value from <b>array</b> is returned into
     * the result array. Array keys are preserved.
     *
     * @see https://php.net/manual/en/function.array-filter.php
     *
     * @param  array|ArrayAccess  $array
     */
    public function filter(mixed $array, ?callable $callback = null, int $mode = 0): array
    {
        if (empty($callback)) {
            $callback = $mode === ARRAY_FILTER_USE_BOTH
                ? Empties::notEmptyBoth()
                : Empties::notEmpty();
        }

        return array_filter($array, $callback, $mode);
    }

    /**
     * Return all the keys or a subset of the keys of an array.
     *
     * @see https://php.net/manual/en/function.array-keys.php
     */
    public function keys(mixed $array): array
    {
        return array_keys($this->resolve($array));
    }

    /**
     * Return all the values of an array.
     *
     * @see  https://php.net/manual/en/function.array-values.php
     */
    public function values(mixed $array): array
    {
        return array_values($this->resolve($array));
    }

    /**
     * Exchanges all keys with their associated values in an array.
     *
     * @see  https://php.net/manual/en/function.array-flip.php
     */
    public function flip(mixed $array): array
    {
        return array_flip($this->resolve($array));
    }

    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param  array  $array
     */
    public function flatten(mixed $array, bool $ignore_keys = true): array
    {
        $result = [];

        foreach ($array as $key => $item) {
            if (! $this->isArrayable($item)) {
                $result = $ignore_keys
                    ? $this->push($result, $item)
                    : $this->set($result, $key, $item);

                continue;
            }

            $flatten = $this->flatten($item, $ignore_keys);

            $values = $ignore_keys ? array_values($flatten) : $flatten;

            $result = array_merge($result, $values);
        }

        return $ignore_keys ? array_values($result) : $result;
    }

    public function flattenKeys(mixed $array, string $delimiter = '.', ?string $prefix = null): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $new_key = ! empty($prefix) || is_numeric($prefix) ? $prefix . $delimiter . $key : $key;

            if (is_array($value)) {
                $values = $this->flattenKeys($value, $delimiter, $new_key);

                $result = array_merge($result, $values);

                continue;
            }

            $result[$new_key] = $value;
        }

        return $result;
    }

    /**
     * Applies the callback to the elements of the given arrays.
     *
     * @param  array|ArrayAccess  $array
     */
    public function map(array|ArrayObject $array, callable $callback, bool $recursive = false): array
    {
        foreach ($array as $key => &$value) {
            if ($recursive && is_array($value)) {
                $value = $this->map($value, $callback, $recursive);
            }
            else {
                $value = Call::callback($callback, $value, $key);
            }
        }

        return $array;
    }

    /**
     * Creating a new instance of the given class by passing the value into the constructor.
     *
     * @param  array  $array
     */
    public function mapInto(array|ArrayObject $array, string $class): array
    {
        foreach ($array as &$value) {
            $value = new $class($value);
        }

        return $array;
    }

    /**
     * Push elements onto the end of array.
     *
     * @see  https://php.net/manual/en/function.array-push.php
     *
     * @param  array|ArrayAccess  $array
     */
    public function push(mixed $array, mixed ...$values): array
    {
        foreach ($values as $value) {
            $array[] = $value;
        }

        return $array;
    }

    /**
     * Assigns a value to an array key.
     *
     * @param  array|ArrayAccess  $array
     */
    public function set(mixed $array, mixed $key, mixed $value = null): array
    {
        if ($this->isArrayable($key)) {
            $array = $this->merge($array, $key);
        }
        else {
            $array[$key] = $value;
        }

        return $array;
    }

    /**
     * Removes an array key.
     *
     * @param  array|ArrayAccess  $array
     * @param  mixed  $key
     */
    public function remove(mixed $array, float|int|string $key): array
    {
        unset($array[$key]);

        return $array;
    }

    /**
     * Call the given Closure with the given value then return the value.
     *
     * @param  array|ArrayAccess  $array
     */
    public function tap(mixed $array, callable $callback): array
    {
        foreach ($array as $key => $value) {
            Call::callback($callback, $value, $key);
        }

        return $array;
    }

    /**
     * Check if the item is an array.
     */
    public function isArrayable(mixed $value = null): bool
    {
        if (is_array($value) || is_object($value)) {
            return true;
        }

        if (
            is_string($value)
            && method_exists($value, 'toArray')
            && ! ReflectionHelper::isStaticMethod($value, 'toArray')
        ) {
            return false;
        }

        if (
            InstanceHelper::of($value, [
                Arrayable::class,
                ArrayableIlluminate::class,
                ArrayableHelper::class,
                ArrayObject::class,
                ArrayAccess::class,
                Arrayable::class,
            ])
        ) {
            return true;
        }

        return InstanceHelper::of($value, Closure::class) && method_exists($value, 'toArray');
    }

    /**
     * Determines if the array or arrayable object is empty.
     */
    public function isEmpty(mixed $value): bool
    {
        $value = is_object($value) && method_exists($value, 'toArray') ? $value->toArray() : $value;
        $value = is_object($value) ? (array) $value : $value;

        return is_array($value) && empty($value);
    }

    /**
     * Determines if the value is doesn't empty.
     */
    public function doesntEmpty(mixed $value): bool
    {
        return ! $this->isEmpty($value);
    }

    /**
     * Return an array with elements in reverse order.
     *
     * @param  array  $array
     */
    public function reverse(array|ArrayObject $array, bool $preserve_keys = false): array
    {
        return array_reverse($array, $preserve_keys);
    }

    /**
     * Return the first element in an array passing a given truth test.
     *
     * @param  array  $array
     */
    public function first(array|ArrayObject $array, ?callable $callback = null, mixed $default = null): mixed
    {
        if (is_null($callback)) {
            return empty($array) ? Call::value($default) : reset($array);
        }

        foreach ($array as $key => $value) {
            if (Call::callback($callback, $value, $key)) {
                return $value;
            }
        }

        return Call::value($default);
    }

    /**
     * Return the last element in an array passing a given truth test.
     *
     * @param  array  $array
     */
    public function last(array|ArrayObject $array, ?callable $callback = null, mixed $default = null): mixed
    {
        if (is_null($callback)) {
            return empty($array) ? Call::value($default) : end($array);
        }

        return $this->first(array_reverse($array, true), $callback, $default);
    }

    /**
     * Remove a portion of the array and replace it with something else.
     *
     * @see https://php.net/manual/en/function.array-splice.php
     *
     * @param  array  $array
     */
    public function splice(array|ArrayObject $array, int $offset, ?int $length = null, mixed $replacement = null): array
    {
        array_splice($array, $offset, $length, $replacement);

        return $array;
    }

    /**
     * Returns the number of array elements.
     */
    public function count(array|ArrayObject $array): int
    {
        return InstanceHelper::of($array, ArrayObject::class) ? $array->count() : count($array);
    }
}
