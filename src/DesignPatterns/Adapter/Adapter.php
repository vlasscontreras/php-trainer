<?php

/**
 * The adapter pattern
 *
 * This pattern is essentially what it sounds like. When an object is
 * not compatible with an implementation but are in the same context,
 * we can use adapters.
 *
 * Adapters are classes that wrap an object of an incompatible type,
 * and translate the equivalent methods to the implemented class.
 */

namespace Trainer\DesignPatterns\Adapter;

use Trainer\DesignPatterns\Adapter\Book;
use Trainer\DesignPatterns\Adapter\EReaderAdapter;
use Trainer\DesignPatterns\Adapter\Kindle;
use Trainer\DesignPatterns\Adapter\Person;
use Trainer\ExecutableInterface;

class Adapter implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $person = new Person();

        // A person can read a normal book.
        $book = new Book();
        $person->read($book);

        // But is not ready to ready e-books.
        $kindle = new Kindle();
        // $person->read($kindle); // Fatal error!

        // But if we adapt the e-book to what the person can read.
        $person->read(new EReaderAdapter($kindle)); // It works 😃
    }
}
