<?php

namespace Trainer\Operators;

use stdClass;
use Trainer\Executable;

class Logic extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'operator:logic-precedence';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // AND.
        $word = true and false;
        $symbol = true && false;

        echo $word ? '✅ (true and false) is true' : '❌ (true and false) is false';
        echo PHP_EOL;

        echo $symbol ? '✅ (true && false) is true' : '❌ (true && false) is false';
        echo PHP_EOL . PHP_EOL;

        // OR.
        $word = false or true;
        $symbol = false || true;

        echo $word ? '✅ (true or false) is true' : '❌ (true or false) is false';
        echo PHP_EOL;

        echo $symbol ? '✅ (true || false) is true' : '❌ (true || false) is false';
        echo PHP_EOL;
    }
}
