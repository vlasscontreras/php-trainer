<?php

namespace Trainer\Principles\DependencyInversion;

interface ConnectionInterface
{
    /**
     * Connect to provider
     *
     * @return void
     */
    public function connect(): void;
}
