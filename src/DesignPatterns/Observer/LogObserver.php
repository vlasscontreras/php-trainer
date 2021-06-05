<?php

namespace Trainer\DesignPatterns\Observer;

use Trainer\DesignPatterns\Observer\ObserverInterface;

class LogObserver implements ObserverInterface
{
    /**
     * @inheritdoc
     */
    public function handle(): void
    {
        echo 'Loging data...' . PHP_EOL;
    }
}
