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

namespace DragonCode\Contracts\Http;

use DragonCode\Contracts\Support\Arrayable;
use Psr\Http\Message\UriInterface;

interface Builder extends Arrayable, UriInterface
{
    public const PHP_URL_ALL = -1;

    /**
     * Parse a URL.
     *
     * @param  \Psr\Http\Message\UriInterface|string  $url
     *
     * @return $this
     */
    public function parse($url, int $component = self::PHP_URL_ALL): self;

    /**
     * Populate an object with parsed data.
     *
     * @return $this
     */
    public function parsed(array $parsed): self;

    /**
     * Retrieve the domain name of the URI.
     */
    public function getDomain(): string;

    /**
     * Retrieve the domain level name of the URI.
     */
    public function getDomainLevel(int $level = 0): string;

    /**
     * Retrieve the base domain name of the URI.
     */
    public function getBaseDomain(): string;

    /**
     * Retrieve the subdomain name of the URI.
     */
    public function getSubDomain(): string;

    /**
     * Retrieve the scheme and host of the URI.
     */
    public function getBaseUrl(): string;

    /**
     * Retrieve the user name component of the URI.
     */
    public function getUser(): string;

    /**
     * Retrieve the user password component of the URI.
     */
    public function getPassword(): string;

    /**
     * Remove the fragment component from the URI.
     */
    public function removeFragment(): self;

    /**
     * Retrieve the query array of the URI.
     */
    public function getQueryArray(): array;

    /**
     * Return an instance with the specified query object.
     */
    public function putQuery(string $key, $value): self;

    /**
     * Return an instance with the specified query object.
     */
    public function removeQuery(string $key): self;

    /**
     * Return an instance with the specified `UriInterface`.
     */
    public function fromPsr(UriInterface $uri): self;

    /**
     * Return the string representation as a URI reference.
     */
    public function toPsr(): UriInterface;

    /**
     * Return the string representation as a URI reference.
     */
    public function toUrl(): string;
}
