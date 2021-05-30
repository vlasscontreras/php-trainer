<?php

namespace Trainer\DesignPatterns\Strategy;

use Trainer\DesignPatterns\Strategy\LoggerInterface;

class FileLogger implements LoggerInterface
{
    /**
     * @inheritdoc
     */
    public function log(string $message): void
    {
        echo '📁 Log to file: ' . $message;
    }
}
