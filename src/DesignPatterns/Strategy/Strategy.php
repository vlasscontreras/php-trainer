<?php

/**
 * The strategy pattern
 *
 * This pattern is used to define a family of algorythms and make
 * them interchangeable.
 */

namespace Trainer\DesignPatterns\Strategy;

use Trainer\ExecutableInterface;

class Strategy implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        /**
         * All the algorythms are implemented the same way, but they
         * might differ inside.
         *
         * Logger is our application class that implements any of
         * those algorythms.
         */
        $logger = new Logger();

        // Let's say we want to log to a file.
        $logger->logMessage('I am a message', new FileLogger());
        echo PHP_EOL;

        // Or we want to have them on the database instead.
        $logger->logMessage('I am a message', new DatabaseLogger());
        echo PHP_EOL;

        // Or-or-or 😁 to a web service! 😃
        $logger->logMessage('I am a message', new WebServiceLogger());
        echo PHP_EOL;
    }
}
