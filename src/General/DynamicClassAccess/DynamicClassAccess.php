<?php

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
