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

namespace DragonCode\Contracts\Cashier\Helpers;

use Illuminate\Database\Eloquent\Model;

/** @method static Statuses make(Model $model) */
interface Statuses
{
    public function __construct(Model $model);

    public function hasUnknown($status = null): bool;

    public function hasCreated($status = null): bool;

    public function hasFailed($status = null): bool;

    public function hasRefunded($status = null): bool;

    public function hasRefunding($status = null): bool;

    public function hasSuccess($status = null): bool;

    public function inProgress($status = null): bool;
}
