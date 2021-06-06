<?php

/**
 * The nullsafe operator (PHP ^8.0)
 *
 * It runs a check if the value is defined in a chain-like syntax
 * making the code cleaner for when a value in a chain might not
 * be defined.
 */

namespace Trainer\Operators;

use stdClass;
use Trainer\ExecutableInterface;

class Nullsafe implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // When values are defined, we can just access them
        $personOne = new stdClass();
        $personOne->profile = new stdClass();
        $personOne->profile->title = 'Web Developer' . PHP_EOL;

        echo $personOne->profile->title;

        // But if sometimes one of the values is not defined?
        $personTwo = new stdClass();
        $personTwo->profile = null;

        // This breaks the program.
        // $personTwo->profile->title;

        // We can safely get the value only if it's defined.
        $personTwo->profile?->title;

        // And even better, use null coalesce.
        echo $personTwo->profile?->title ?? 'Not Defined';
        echo PHP_EOL;
    }
}
