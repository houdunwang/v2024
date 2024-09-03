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
use DragonCode\Support\Exceptions\NotValidUrlException;
use DragonCode\Support\Facades\Helpers\Str;
use DragonCode\Support\Facades\Http\Builder as UrlBuilder;
use Psr\Http\Message\UriInterface;
use Throwable;

class Url
{
    protected array $chars = [
        'А' => '%D0%90',
        'а' => '%D0%B0',
        'Б' => '%D0%91',
        'б' => '%D0%B1',
        'В' => '%D0%92',
        'в' => '%D0%B2',
        'Г' => '%D0%93',
        'г' => '%D0%B3',
        'Д' => '%D0%94',
        'д' => '%D0%B4',
        'Е' => '%D0%95',
        'е' => '%D0%B5',
        'Ж' => '%D0%96',
        'ж' => '%D0%B6',
        'З' => '%D0%97',
        'з' => '%D0%B7',
        'И' => '%D0%98',
        'и' => '%D0%B8',
        'Й' => '%D0%99',
        'й' => '%D0%B9',
        'К' => '%D0%9A',
        'к' => '%D0%BA',
        'Л' => '%D0%9B',
        'л' => '%D0%BB',
        'М' => '%D0%9C',
        'м' => '%D0%BC',
        'Н' => '%D0%9D',
        'н' => '%D0%BD',
        'О' => '%D0%9E',
        'о' => '%D0%BE',
        'П' => '%D0%9F',
        'п' => '%D0%BF',
        'Р' => '%D0%A0',
        'р' => '%D1%80',
        'С' => '%D0%A1',
        'с' => '%D1%81',
        'Т' => '%D0%A2',
        'т' => '%D1%82',
        'У' => '%D0%A3',
        'у' => '%D1%83',
        'Ф' => '%D0%A4',
        'ф' => '%D1%84',
        'Х' => '%D0%A5',
        'х' => '%D1%85',
        'Ц' => '%D0%A6',
        'ц' => '%D1%86',
        'Ч' => '%D0%A7',
        'ч' => '%D1%87',
        'Ш' => '%D0%A8',
        'ш' => '%D1%88',
        'Щ' => '%D0%A9',
        'щ' => '%D1%89',
        'Ъ' => '%D0%AA',
        'ъ' => '%D1%8A',
        'Ы' => '%D0%AB',
        'ы' => '%D1%8B',
        'Ь' => '%D0%AC',
        'ь' => '%D1%8C',
        'Э' => '%D0%AD',
        'э' => '%D1%8D',
        'Ю' => '%D0%AE',
        'ю' => '%D1%8E',
        'Я' => '%D0%AF',
        'я' => '%D1%8F',
        'Ё' => '%D0%81',
        'ё' => '%D1%91',
    ];

    /**
     * Parsing URL into components.
     *
     * @param  BuilderContract|string|null  $url
     */
    public function parse(string|UriInterface|null $url): Builder
    {
        return UrlBuilder::parse($url);
    }

    /**
     * Check if the string is a valid URL.
     *
     * @param  BuilderContract|string|null  $url
     */
    public function is(mixed $url): bool
    {
        try {
            $url = Str::replace((string) $url, array_keys($this->chars), array_values($this->chars));

            return filter_var($url, FILTER_VALIDATE_URL) !== false;
        }
        catch (Throwable) {
            return false;
        }
    }

    /**
     * Validate if the value is a valid URL or throw an error.
     *
     * @param  BuilderContract|string|null  $url
     *
     * @throws NotValidUrlException
     */
    public function validate(mixed $url): void
    {
        if (! $this->is($url)) {
            throw new NotValidUrlException((string) $url);
        }
    }

    /**
     * Returns the URL after validation, or throws an error.
     *
     * @param  BuilderContract|string|null  $url
     *
     * @throws NotValidUrlException
     *
     * @return BuilderContract|\DragonCode\Support\Http\Builder|string
     */
    public function validated(mixed $url): mixed
    {
        $this->validate($url);

        return $url;
    }

    /**
     * Check if the specified URL exists.
     *
     * @param  BuilderContract|string|null  $url
     *
     * @throws NotValidUrlException
     */
    public function exists(string|UriInterface|null $url): bool
    {
        $this->validate($url);

        try {
            $headers = get_headers($url);

            $key = array_search('HTTP/', $headers);

            $value = $headers[$key] ?? null;

            preg_match('/HTTP\/\d{1}\.?\d?\s[2-3]\d{2}/i', $value, $matches);

            return count($matches) > 0;
        }
        catch (Throwable $e) {
            return false;
        }
    }

    /**
     * Check the existence of the URL and return the default value if it is missing.
     *
     * @param  BuilderContract|string  $url
     * @param  BuilderContract|string  $default
     *
     * @throws NotValidUrlException
     *
     * @return string|null
     */
    public function default(string|UriInterface $url, string|UriInterface $default): string
    {
        $value = $this->exists($url) ? $url : $default;

        return $this->validated($value);
    }
}
