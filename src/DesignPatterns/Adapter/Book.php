<?php

namespace Trainer\DesignPatterns\Adapter;

use Trainer\DesignPatterns\Adapter\BookInterface;

class Book implements BookInterface
{
    /**
     * @inheritdoc
     */
    public function open(): string
    {
        return 'Open the book';
    }

    /**
     * @inheritdoc
     */
    public function turnPage(): string
    {
        return 'Go to next page';
    }
}
