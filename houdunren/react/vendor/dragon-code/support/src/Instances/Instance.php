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

namespace DragonCode\Support\Instances;

use DragonCode\Support\Facades\Helpers\Arr as ArrHelper;
use DragonCode\Support\Facades\Instances\Reflection as ReflectionHelper;
use DragonCode\Support\Facades\Types\Is as IsHelper;
use ReflectionClass;

class Instance
{
    /**
     * Checks if the item being checked inherits from other objects and interfaces.
     *
     * @param  object|callable|string  $haystack
     * @param  string|array<string>  $needles
     */
    public function of(mixed $haystack, mixed $needles): bool
    {
        if (! $this->exists($haystack)) {
            return false;
        }

        $reflection = $this->resolve($haystack);

        foreach (ArrHelper::wrap($needles) as $needle) {
            if (! $this->exists($needle)) {
                continue;
            }

            if ($this->findTrait($reflection, $needle)) {
                return true;
            }

            if (is_a($haystack, $needle, true)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Extract the trailing name component from a file path.
     */
    public function basename(object|string $class): ?string
    {
        $class = $this->classname($class);

        return basename(str_replace('\\', '/', (string) $class)) ?: null;
    }

    /**
     * Gets the class name of the object.
     */
    public function classname(object|string|null $class = null): ?string
    {
        if (IsHelper::object($class)) {
            return get_class($class);
        }

        return class_exists($class) || interface_exists($class) || enum_exists($class) ? $class : null;
    }

    /**
     * Checks if the object exists.
     *
     * @param  object|string  $haystack
     */
    public function exists(mixed $haystack): bool
    {
        if (IsHelper::object($haystack)) {
            return true;
        }

        return IsHelper::string($haystack) && (class_exists($haystack) || interface_exists($haystack) || trait_exists($haystack) || enum_exists($haystack));
    }

    /**
     * Creates a ReflectionClass object.
     */
    protected function resolve(object|string $class): ReflectionClass
    {
        return ReflectionHelper::resolve($class);
    }

    protected function findTrait(ReflectionClass $haystack, object|string $needle): bool
    {
        if (in_array($needle, $haystack->getTraitNames(), true)) {
            return true;
        }

        foreach ($haystack->getTraits() as $trait) {
            if (in_array($needle, $trait->getTraitNames(), true)) {
                return true;
            }

            if ($this->findTrait($trait, $needle)) {
                return true;
            }
        }

        return false;
    }
}
