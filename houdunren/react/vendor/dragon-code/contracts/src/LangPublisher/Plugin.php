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

namespace DragonCode\Contracts\LangPublisher;

interface Plugin
{
    /**
     * Specifies the namespace of the package, upon detection
     * of which the localization will be installed.
     *
     * Return `null` if you always need to install the localization.
     */
    public function vendor(): ?string;

    /**
     * Specifies the relative path to the source files.
     */
    public function files(): array;

    /**
     * Determines the existence of a vendor in the application.
     */
    public function has(): bool;
}
