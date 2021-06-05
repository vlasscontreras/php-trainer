<?php

/**
 * This pattern is used to observe execution of actions in a class,
 * called subject, but this class doesn't need to be aware of
 * anything about those classes who are observing (observers).
 *
 * A list observers subscribe (observes) a subject, and the subject
 * notifies all of them once the triggering action occurs.
 *
 * Pretty much like: Event happens -> Notify listeners.
 */

namespace Trainer\DesignPatterns\Observer;

use Trainer\DesignPatterns\Observer\Auth;
use Trainer\DesignPatterns\Observer\EmailObserver;
use Trainer\DesignPatterns\Observer\LogObserver;
use Trainer\ExecutableInterface;

class Observer implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // Auth is a subject.
        $auth = new Auth();

        // We attach observers to that subject.
        $auth->attach([
            new LogObserver(),
            new EmailObserver(),
            new TraceObserver(),
        ]);

        // And then we execute the action that notifies the obsevers.
        $auth->login('user@example.com');
    }
}
