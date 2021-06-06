<?php

/**
 * Dynamic Class Access (PHP ^8.0)
 *
 * The `::class` value of a class is also available in objects on a
 * variable. Functionally equivalent to `get_class()`.
 */

namespace Trainer\General\DynamicClassAccess;

use Trainer\ExecutableInterface;

class DynamicClassAccess implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $logger = new Logger();

        echo $logger::class . PHP_EOL;
        echo get_class($logger) . PHP_EOL;
    }
}
