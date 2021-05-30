<?php

namespace Trainer\DesignPatterns\Strategy;

class Logger
{
    /**
     * Log a message
     *
     * @param string $message
     * @param LoggerInterface $logger
     * @return void
     */
    public function logMessage(string $message, LoggerInterface $logger): void
    {
        $logger->log($message);
    }
}
