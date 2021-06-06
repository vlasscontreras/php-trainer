<?php

/**
 * Dependency Inversion Principle
 *
 * This principle dictates that high-level (isn't concerned about
 * details and specifics) modules should not depend on low-level (it
 * is more concerned about details and specifics) modules. Instead,
 * they should depend on abstractions, not concretions.
 *
 * Low-level modules should also depend on abstractions, no
 * concretions.
 */

namespace Trainer\Principles\DependencyInversion;

use Trainer\Executable;

class DependencyInversion extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'principle:dependency-inversion';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        /**
         * On this case, DataBaseConnection depends upon an abstraction
         * which is the ConnectionInterface and conforms to it.
         */
        $databaseConnection = new DatabaseConnection();

        /**
         * And the password reminder expects a ConnectionInterface, not
         * the DataBaseConnection concretion, hence depends on an
         * abstraction as well, not a concretion.
         */
        $passwordReminder = new PasswordReminder($databaseConnection);
        $passwordReminder->send();
    }
}
