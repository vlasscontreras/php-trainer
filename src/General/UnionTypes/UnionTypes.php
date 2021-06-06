<?php

namespace Trainer\General\UnionTypes;

use DateTime;
use Trainer\Executable;

class UnionTypes extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'union-types';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $user = new User();

        // It works.
        $user->cancel('next week');
        echo PHP_EOL;

        $user->cancel(new DateTime());

        // It won't
        // $user->cancel($user);
    }
}
