<?php

namespace Trainer\DesignPatterns\Observer;

use Trainer\DesignPatterns\Observer\ObserverInterface;

class TraceObserver implements ObserverInterface
{
    /**
     * @inheritdoc
     */
    public function handle(): void
    {
        echo 'Tracing data...' . PHP_EOL;
    }
}
