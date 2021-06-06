<?php

/**
 * Grouped imports (PHP ^7.0)
 *
 * Instead of defining the entire class path, we can group imports of
 * a namespace into one curly brace group.
 */

namespace Trainer\General\GroupedImports;

use Trainer\Executable;
use Trainer\General\GroupedImports\Types\{
    Person,
    Animal,
    Environment\Water,
};

class GroupedImports extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'grouped-imports';

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
