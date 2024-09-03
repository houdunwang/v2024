<?php

/**
 * This file is part of the "laravel-lang/native-currency-names" project.
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

namespace LaravelLang\NativeCurrencyNames\Data;

use Illuminate\Contracts\Support\Arrayable;

class CurrencyData implements Arrayable
{
    public function __construct(
        public string $code,
        public ?int $numeric,
        public string $native,
        public string $localized
    ) {}

    public function toArray(): array
    {
        return [
            'code'      => $this->code,
            'numeric'   => $this->numeric,
            'native'    => $this->native,
            'localized' => $this->localized,
        ];
    }
}
