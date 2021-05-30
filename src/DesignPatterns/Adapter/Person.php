<?php

namespace Training\DesignPatterns\Adapter;

use Training\DesignPatterns\Adapter\BookInterface;

class Person
{
    /**
     * Read a book 🤓
     *
     * @param BookInterface $book
     * @return void
     */
    public function read(BookInterface $book)
    {
        echo $book->open() . PHP_EOL;
        echo $book->turnPage() . PHP_EOL;
    }
}
