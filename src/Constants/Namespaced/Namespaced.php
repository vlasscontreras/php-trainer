<?php

namespace Trainer\Constants\Namespaced;

use Trainer\Executable;

class Namespaced extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'constants:namespaced';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        include 'math.php';

        echo Math\PI;
        echo PHP_EOL;

        // echo Math\EPSILON; // Fatal error!
        echo EPSILON;
        echo PHP_EOL;
    }
}
