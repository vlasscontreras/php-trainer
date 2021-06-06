<?php

namespace Trainer\General\UnionTypes;

use DateTime;
use Trainer\ExecutableInterface;

class UnionTypes implements ExecutableInterface
{
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
