<?php

namespace Trainer\DesignPatterns\Strategy;

use Trainer\DesignPatterns\Strategy\LoggerInterface;

class DatabaseLogger implements LoggerInterface
{
    /**
     * @inheritdoc
     */
    public function log(string $message): void
    {
        echo '🗃 Log to database: ' . $message;
    }
}
