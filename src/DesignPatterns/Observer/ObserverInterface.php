<?php

namespace Trainer\DesignPatterns\Observer;

interface ObserverInterface
{
    /**
     * Handle the observer
     *
     * @return void
     */
    public function handle(): void;
}
