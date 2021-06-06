<?php

namespace Trainer\General\AnonymousClasses;

interface LoggerInterface
{
    /**
     * Log message
     *
     * @param string $message
     * @return void
     */
    public function message(string $message): void;
}
