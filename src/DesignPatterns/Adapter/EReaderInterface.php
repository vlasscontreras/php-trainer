<?php

namespace Trainer\DesignPatterns\Adapter;

interface EReaderInterface
{
    /**
     * Turn e-reader on
     *
     * @return string
     */
    public function turnOn(): string;

    /**
     * Go to next e-book page.
     *
     * @return string
     */
    public function goToNextPage(): string;
}
