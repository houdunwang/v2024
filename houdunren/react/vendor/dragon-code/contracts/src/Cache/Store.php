<?php

/*
 * This file is part of the "dragon-code/contracts" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@ai-rus.com>
 *
 * @copyright 2021 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/contracts
 */

declare(strict_types=1);

namespace DragonCode\Contracts\Cache;

interface Store
{
    /**
     * Retrieve an item from the cache by key.
     *
     * @param  mixed|null  $default
     */
    public function get(string $key, $default = null);

    /**
     * Store an item in the cache for a given number of seconds.
     */
    public function put(string $key, $value, int $seconds);

    /**
     * Store an item in the cache for a given number of seconds.
     *
     * The `put` method alias to improve usability.
     */
    public function remember(string $key, $value, int $seconds);

    /**
     * Store an item forever, regardless of TTL.
     */
    public function rememberForever(string $key, $value);

    /**
     * Remove an item from the cache.
     */
    public function forget(string $key): void;

    /**
     * Checks for the existence of a key.
     */
    public function has(string $key): bool;

    /**
     * Checks the key for its absence.
     */
    public function doesntHave(string $key): bool;
}
