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

namespace DragonCode\Contracts\Cashier\Config;

interface Main
{
    public function isProduction(): bool;

    public function getLogger(): ?string;

    public function getQueue(): Queue;

    public function getCheckDelay(): int;

    public function getCheckTimeout(): int;

    public function getAutoRefundEnabled(): bool;

    public function getAutoRefundDelay(): int;

    public function getDriver(string $name): Driver;
}
