<?php

namespace Trainer\DesignPatterns\Strategy;

interface LoggerInterface
{
    /**
     * Log a message
     *
     * @param string $message
     * @return void
     */
    public function log(string $message): void;
}
