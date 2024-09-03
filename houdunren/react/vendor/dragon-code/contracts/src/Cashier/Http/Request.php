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

namespace DragonCode\Contracts\Cashier\Http;

use DragonCode\Contracts\Cashier\Resources\Model;
use DragonCode\Contracts\Http\Builder;

/**
 * @method static Request make(Model $model)
 */
interface Request
{
    public function __construct(Model $model);

    public function model(): Model;

    public function method(): string;

    public function uri(): Builder;

    public function headers(): array;

    public function getRawHeaders(): array;

    public function body(): array;

    public function getRawBody(): array;

    public function getHttpOptions(): array;

    public function refreshAuth(): void;
}
