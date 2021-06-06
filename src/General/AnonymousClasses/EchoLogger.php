<?php

namespace Trainer\General\AnonymousClasses;

use Trainer\General\AnonymousClasses\LoggerInterface;

class EchoLogger implements LoggerInterface
{
    /**
     * @inheritdoc
     */
    public function message(string $message): void
    {
        echo $message;
    }
}
