<?php

namespace Trainer\DesignPatterns\Observer;

use Trainer\DesignPatterns\Observer\ObserverInterface;

class EmailObserver implements ObserverInterface
{
    /**
     * @inheritdoc
     */
    public function handle(): void
    {
        echo 'Sending email...' . PHP_EOL;
    }
}
