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

include './vendor/autoload.php';

use Training\DesignPatterns\Adapter\Book;
use Training\DesignPatterns\Adapter\EReaderAdapter;
use Training\DesignPatterns\Adapter\Kindle;
use Training\DesignPatterns\Adapter\Person;

$book = new Book();
$person = new Person();

// A person can read a normal book.
$person->read($book);

// But is not ready to ready e-books.
$kindle = new Kindle();
// $person->read($kindle); // Fatal error!

// But if we adapt the e-book to what the person can read.
$person->read(new EReaderAdapter($kindle));
