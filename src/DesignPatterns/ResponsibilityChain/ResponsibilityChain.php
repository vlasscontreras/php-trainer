<?php

/**
 * The chain of responsibility pattern
 *
 * This pattern is used to connect objects that can either handle or
 * stop the execution of a request. This is done by storing a
 * successor on each object, so in case one of the items in the chain
 * did not result in a stopped exection, can instruct the next item
 * to run its logic.
 */

namespace Trainer\DesignPatterns\ResponsibilityChain;

use Trainer\DesignPatterns\ResponsibilityChain\AlarmChecker;
use Trainer\DesignPatterns\ResponsibilityChain\LightsChecker;
use Trainer\DesignPatterns\ResponsibilityChain\LockChecker;
use Trainer\Executable;

class ResponsibilityChain extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'pattern:responsibility-chain';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // Set up chain items.
        $lightsChecker = new LightsChecker();
        $lockChecker = new LockChecker();
        $alarmChecker = new AlarmChecker();

        // Connect the chain.
        $lightsChecker->setSuccessor($lockChecker);
        $lockChecker->setSuccessor($alarmChecker);

        // Now let's make the check "request".
        $homeStatus = new HomeStatus(
            false, // lights
            true, // locked
            false // alarm
        );

        /**
         * Even though we're calling the checker on the lights only,
         * in the given home status request, the failling step is the
         * last one, and that's the exception thrown by the lights
         * checker.
         */
        $lightsChecker->check($homeStatus);
    }
}
