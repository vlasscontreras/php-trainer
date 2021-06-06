<?php

/**
 * Anonymouse classes (PHP ^7.0)
 *
 * These classes are not files, but code blocks that define a nameless
 * class just like anonymous functions. Use with caution! Suitable for
 * cases where you want to change things on the fly, tests with
 * mockery, debugging, etc.
 */

namespace Trainer\General\AnonymousClasses;

use Trainer\General\AnonymousClasses\LoggerInterface;
use Trainer\ExecutableInterface;

class AnonymousClasses implements ExecutableInterface
{

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // Should work just fine, right?
        self::test(new EchoLogger());

        // Wait, what?
        self::test(new class implements LoggerInterface {
            public function message(string $message): void
            {
                var_dump($message);
            }
        });
    }

    /**
     * Test case
     *
     * @param LoggerInterface $logger
     * @return void
     */
    protected static function test(LoggerInterface $logger)
    {
        $logger->message('It is working!');
        echo PHP_EOL;
    }
}
