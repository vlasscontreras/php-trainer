<?php

/**
 * Grouped imports
 *
 * Instead of defining the entire class path, we can group imports of
 * a namespace into one curly brace group.
 */

namespace Trainer\General;

use Trainer\ExecutableInterface;
use Trainer\General\Types\{
    Person,
    Animal,
    Environment\Water,
};

class GroupedImports implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        print_r([
            new Person(),
            new Animal(),
            new Water(),
        ]);
    }
}
