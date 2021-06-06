<?php

/**
 * The null coalesce operator (PHP ^7.0)
 *
 * It returns the value of $a if it's defined, otherwise it will
 * return $b.
 *
 * @link https://www.php.net/manual/en/migration70.new-features.php
 * @link https://www.php.net/manual/en/types.comparisons.php
 */

namespace Trainer\Operators;

use Trainer\Executable;

class NullCoalesce extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'operator:null-coalesce';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $b = '✅ But I am here';

        // $a is not set, returns fallback.
        echo $a ?? '❌ Nonse not available.';
        echo PHP_EOL;

        // $b is set, returns its value and fallback is ignored.
        echo $b ?? '😤 And it will never will.';
        echo PHP_EOL;
    }
}
