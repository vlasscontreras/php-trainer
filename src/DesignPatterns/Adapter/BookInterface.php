<?php

namespace Training\DesignPatterns\Adapter;

interface BookInterface
{
    /**
     * Start the book
     *
     * @return string
     */
    public function open(): string;

    /**
     * Go to the next page of the book
     *
     * @return string
     */
    public function turnPage(): string;
}
