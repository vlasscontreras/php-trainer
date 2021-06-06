<?php

namespace Trainer\Principles\DependencyInversion;

class DatabaseConnection implements ConnectionInterface
{
    /**
     * Connect to database
     *
     * @return void
     */
    public function connect(): void
    {
        echo '✅ Connected to database.' . PHP_EOL;
    }
}
