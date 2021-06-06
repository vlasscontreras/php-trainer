<?php

/**
 * String Helpers
 *
 * To determine if a string starts or ends with another string, or if
 * a string contains another string.
 */

namespace Trainer\General\StringHelpers;

use Trainer\ExecutableInterface;

class StringHelpers implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $id = 'ch_1IzO7K2eZvKYlo2CIGjQqdcy';

        echo 'Starts with "ch_"? ';
        echo self::answer(
            str_starts_with($id, 'ch_')
        );
        echo PHP_EOL;

        echo 'Ends with "dcy"? ';
        echo self::answer(
            str_ends_with($id, 'dcy')
        );
        echo PHP_EOL;

        echo 'Contains "o4Fs"? ';
        echo self::answer(
            str_contains($id, 'o4Fs')
        );
        echo PHP_EOL;
    }

    /**
     * Make a creative response
     *
     * @param bool $result
     * @return string
     */
    public static function answer(bool $result)
    {
        return $result ? '✅ Yup' : '❌ Nope';
    }
}
