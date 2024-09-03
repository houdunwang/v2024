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

use DragonCode\Contracts\Http\Builder as BuilderContract;
use DragonCode\Support\Concerns\Castable;
use DragonCode\Support\Concerns\Validation;
use DragonCode\Support\Exceptions\UnknownUrlComponentIndexException;
use DragonCode\Support\Facades\Helpers\Arr;
use DragonCode\Support\Facades\Helpers\Str;
use DragonCode\Support\Facades\Http\Url as UrlHelper;
use DragonCode\Support\Helpers\Ables\Stringable;
use Psr\Http\Message\UriInterface;

class Builder implements BuilderContract
{
    use Castable;
    use Validation;

    protected array $parsed = [];

    protected array $components = [
        PHP_URL_SCHEME   => 'scheme',
        PHP_URL_HOST     => 'host',
        PHP_URL_PORT     => 'port',
        PHP_URL_USER     => 'user',
        PHP_URL_PASS     => 'pass',
        PHP_URL_QUERY    => 'query',
        PHP_URL_PATH     => 'path',
        PHP_URL_FRAGMENT => 'fragment',
    ];

    protected array $casts = [
        'query' => 'array',
        'port'  => 'integer',
    ];

    protected array $validate = [
        PHP_URL_SCHEME   => ['null', 'string'],
        PHP_URL_HOST     => ['null', 'string'],
        PHP_URL_PORT     => ['null', 'integer'],
        PHP_URL_USER     => ['null', 'string'],
        PHP_URL_PASS     => ['null', 'string'],
        PHP_URL_QUERY    => ['null', 'string', 'array'],
        PHP_URL_PATH     => ['null', 'string'],
        PHP_URL_FRAGMENT => ['null', 'string'],
    ];

    /**
     * Return the string representation as a URI reference.
     */
    public function __toString(): string
    {
        return $this->toUrl();
    }

    /**
     * Gets the current instance of the object.
     */
    public function same(): self
    {
        return $this;
    }

    /**
     * Parse a URL.
     *
     * @param  \Psr\Http\Message\UriInterface|string|null  $url
     *
     * @return Builder
     */
    public function parse(mixed $url, int $component = self::PHP_URL_ALL): BuilderContract
    {
        if ($component === self::PHP_URL_ALL) {
            UrlHelper::validate($url);
        }

        $instance = $this->resolveSame($component);

        $key = $this->componentNameByIndex($component);

        return $component === self::PHP_URL_ALL || empty($key)
            ? $instance->parsed(parse_url($url))
            : $instance->parsed([$key => parse_url($url, $component)]);
    }

    /**
     * Populate an object with parsed data.
     *
     * @return Builder
     */
    public function parsed(array $parsed): BuilderContract
    {
        $components = array_values($this->components);

        $filtered = Arr::only($parsed, $components);

        $this->parsed = Arr::of($this->parsed)
            ->merge($filtered)
            ->toArray();

        $this->cast($this->parsed);

        return $this;
    }

    /**
     * Retrieve the domain name of the URI.
     */
    public function getDomain(): string
    {
        return $this->getHost();
    }

    /**
     * Retrieve the domain level name of the URI.
     */
    public function getDomainLevel(int $level = 0): string
    {
        return Str::of($this->getHost())
            ->explode('.')
            ->reverse()
            ->get($level - 1, '');
    }

    /**
     * Retrieve the base domain name of the URI.
     */
    public function getBaseDomain(): string
    {
        $first  = $this->getDomainLevel(1);
        $second = $this->getDomainLevel(2);

        if ($first && $second) {
            return $second . '.' . $first;
        }

        return '';
    }

    /**
     * Retrieve the subdomain name of the URI.
     */
    public function getSubDomain(): string
    {
        return Str::of($this->getHost())
            ->when(
                fn ($host) => Str::count($host, '.') > 1,
                fn (Stringable $string) => $string
                    ->explode('.')
                    ->splice(-2)
                    ->implode('.')
            )->toString();
    }

    /**
     * Retrieve the scheme and host of the URI.
     */
    public function getBaseUrl(): string
    {
        return Str::of('://')
            ->prepend($this->getScheme())
            ->append($this->getHost())
            ->trim('://')
            ->toString();
    }

    /**
     * Retrieve the scheme component of the URI.
     */
    public function getScheme(): string
    {
        return (string) $this->get(PHP_URL_SCHEME);
    }

    /**
     * Retrieve the authority component of the URI.
     */
    public function getAuthority(): string
    {
        $auth = $this->getUserInfo();
        $host = $this->getHost();
        $port = $this->getPort();

        return (string) Str::of("$auth@$host:$port")->trim('@:');
    }

    /**
     * Retrieve the user information component of the URI.
     */
    public function getUserInfo(): string
    {
        $user = $this->getUser();
        $pass = $this->getPassword();

        return (string) Str::of("$user:$pass")->trim(':');
    }

    /**
     * Retrieve the user name component of the URI.
     */
    public function getUser(): string
    {
        return (string) $this->get(PHP_URL_USER);
    }

    /**
     * Retrieve the user password component of the URI.
     */
    public function getPassword(): string
    {
        return (string) $this->get(PHP_URL_PASS);
    }

    /**
     * Retrieve the host component of the URI.
     */
    public function getHost(): string
    {
        return (string) $this->get(PHP_URL_HOST);
    }

    /**
     * Retrieve the port component of the URI.
     */
    public function getPort(): ?int
    {
        return $this->get(PHP_URL_PORT);
    }

    /**
     * Retrieve the path component of the URI.
     */
    public function getPath(): string
    {
        $value = $this->get(PHP_URL_PATH);

        return Str::of($value)
            ->trim('/')
            ->start('/')
            ->when(
                fn (Stringable $path) => $path->toString() !== '/',
                fn (Stringable $path) => $path,
                ''
            );
    }

    /**
     * Retrieve the query string of the URI.
     */
    public function getQuery(): string
    {
        if ($value = $this->get(PHP_URL_QUERY)) {
            return is_string($value) ? $value : http_build_query($value);
        }

        return '';
    }

    /**
     * Retrieve the query array of the URI.
     */
    public function getQueryArray(): array
    {
        if ($value = $this->get(PHP_URL_QUERY)) {
            return $value;
        }

        return [];
    }

    /**
     * Retrieve the fragment component of the URI.
     */
    public function getFragment(): string
    {
        return (string) $this->get(PHP_URL_FRAGMENT);
    }

    /**
     * Remove the fragment component from the URI.
     *
     * @return Builder
     */
    public function removeFragment(): BuilderContract
    {
        return $this->set(PHP_URL_FRAGMENT, null);
    }

    /**
     * Return an instance with the specified scheme.
     *
     * @param  string  $scheme
     */
    public function withScheme($scheme): self
    {
        return $this->set(PHP_URL_SCHEME, $scheme);
    }

    /**
     * Return an instance with the specified user information.
     *
     * @param  string  $user
     * @param  string|null  $password
     */
    public function withUserInfo($user, $password = null): self
    {
        return $this
            ->set(PHP_URL_USER, $user)
            ->set(PHP_URL_PASS, $password);
    }

    /**
     * Return an instance with the specified host.
     *
     * @param  string  $host
     */
    public function withHost($host): self
    {
        return $this->set(PHP_URL_HOST, $host);
    }

    /**
     * Return an instance with the specified port.
     *
     * @param  int|null  $port
     */
    public function withPort($port): self
    {
        return $this->set(PHP_URL_PORT, $port);
    }

    /**
     * Return an instance with the specified path.
     *
     * @param  string  $path
     */
    public function withPath($path): self
    {
        return $this->set(PHP_URL_PATH, $path);
    }

    /**
     * Return an instance with the specified query string.
     *
     * @param  array|string  $query
     */
    public function withQuery($query): self
    {
        return $this->set(PHP_URL_QUERY, $query);
    }

    /**
     * Return an instance with the specified query object.
     *
     * @return Builder
     */
    public function putQuery(string $key, $value): BuilderContract
    {
        $query = $this->get(PHP_URL_QUERY);

        if (empty($value)) {
            $value = is_array($value) ? []
                : (! is_numeric($value) ? null : $value);
        }

        $query = Arr::set($query, $key, $value);

        return $this->set(PHP_URL_QUERY, $query);
    }

    /**
     * Return an instance with the specified query object.
     *
     * @return Builder
     */
    public function removeQuery(string $key): BuilderContract
    {
        $query = $this->get(PHP_URL_QUERY);

        unset($query[$key]);

        return $this->set(PHP_URL_QUERY, $query);
    }

    /**
     * Return an instance with the specified URI fragment.
     *
     * @param  string  $fragment
     */
    public function withFragment($fragment): self
    {
        return $this->set(PHP_URL_FRAGMENT, $fragment);
    }

    /**
     * Return an instance with the specified `UriInterface`.
     *
     * @return Builder
     */
    public function fromPsr(UriInterface $uri): BuilderContract
    {
        $this->parsed = [];

        $this->withScheme($uri->getScheme());
        $this->withHost($uri->getHost());
        $this->withPort($uri->getPort());
        $this->withPath($uri->getPath());
        $this->withQuery($uri->getQuery());
        $this->withFragment($uri->getFragment());

        $auth = explode(':', $uri->getUserInfo());

        $this->withUserInfo(
            $auth[0] ?? null,
            $auth[1] ?? null
        );

        $this->cast($this->parsed);

        return $this;
    }

    /**
     * Return the string representation as a URI reference.
     */
    public function toPsr(): UriInterface
    {
        return $this->same();
    }

    /**
     * Returns parsed data.
     *
     * @return array<null>|array<string>
     */
    public function toArray(): array
    {
        return [
            'scheme'   => $this->getScheme(),
            'user'     => $this->getUser(),
            'pass'     => $this->getPassword(),
            'host'     => $this->getHost(),
            'port'     => $this->getPort(),
            'path'     => $this->getPath(),
            'query'    => $this->getQuery(),
            'fragment' => $this->getFragment(),
        ];
    }

    /**
     * Return the string representation as a URI reference.
     */
    public function toUrl(): string
    {
        return Arr::of($this->prepare())
            ->map(static fn (mixed $value) => (string) $value)
            ->filter()
            ->implode('')
            ->when(fn (Stringable $url) => $url->toString() === '//', '', fn ($url) => $url)
            ->toString();
    }

    protected function componentNameByIndex(int $component): ?string
    {
        $this->validateComponentIndex($component);

        return Arr::get($this->components, $component);
    }

    protected function validateComponentIndex(int $component): void
    {
        $components = array_keys($this->components);

        if ($component !== self::PHP_URL_ALL && ! in_array($component, $components, true)) {
            throw new UnknownUrlComponentIndexException($component);
        }
    }

    protected function set(int $component, $value): self
    {
        $this->validate($component, $value);

        $name = $this->componentNameByIndex($component);

        $this->parsed[$name] = $this->castValue($name, $value);

        return $this;
    }

    protected function get(int $index)
    {
        $name = $this->componentNameByIndex($index);

        return Arr::get($this->parsed, $name);
    }

    protected function getValidationType(int $component): array
    {
        return Arr::get($this->validate, $component, []);
    }

    protected function validate(int $component, $value): void
    {
        $type = $this->getValidationType($component);

        $this->validateType($value, $type);
    }

    /**
     * Based on code by Maksim (Ellrion) Platonov.
     *
     * @see https://gist.github.com/Ellrion/f51ba0d40ae1d62eeae44fd1adf7b704
     */
    protected function prepare(): array
    {
        return [
            BuilderPrepare::make()->of($this->getScheme())->suffix(':'),

            '//',

            BuilderPrepare::make()->of($this->getUser()),
            BuilderPrepare::make()->of($this->getPassword())->prefix(':'),

            $this->getUser() || $this->getPassword() ? '@' : '',

            BuilderPrepare::make()->of($this->getHost()),
            BuilderPrepare::make()->of($this->getPort())->prefix(':'),
            BuilderPrepare::make()->of($this->getPath()),
            BuilderPrepare::make()->of($this->getQuery())->prefix('?'),
            BuilderPrepare::make()->of($this->getFragment())->prefix('#'),
        ];
    }

    protected function resolveSame(int $component = self::PHP_URL_ALL): self
    {
        return $component === self::PHP_URL_ALL ? new self() : $this;
    }
}
