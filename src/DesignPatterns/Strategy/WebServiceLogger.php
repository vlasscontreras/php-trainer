<?php

namespace Trainer\DesignPatterns\Strategy;

use Trainer\DesignPatterns\Strategy\LoggerInterface;

class WebServiceLogger implements LoggerInterface
{
    /**
     * @inheritdoc
     */
    public function log(string $message): void
    {
        echo '🌎 Log to a web service: ' . $message;
    }
}
