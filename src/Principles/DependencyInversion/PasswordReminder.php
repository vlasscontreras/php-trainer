<?php

namespace Trainer\Principles\DependencyInversion;

class PasswordReminder
{
    /**
     * Connection
     *
     * @var ConnectionInterface
     */
    protected ConnectionInterface $connection;

    /**
     * Set up reminder
     *
     * @param ConnectionInterface $connection
     * @return void
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Send reminder.
     *
     * @return void
     */
    public function send()
    {
        $this->connection->connect();

        echo '📧 Reminder sent!' . PHP_EOL;
    }
}
