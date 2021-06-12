<?php

namespace Trainer\OOP\Exceptions;

use Trainer\Executable;

class Exceptions extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'oop:exceptions';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $team = new Team(maxMembers: 3);

        try {
            $team->addMember(new TeamMember('John Doe')); // All good.
            $team->addMember(new TeamMember('Jane Doe')); // All good.
            $team->addMember(new TeamMember('Frank Doe')); // All good.
            $team->addMember(new TeamMember('Mary Doe')); // Hm 🤔.
        } catch (TeamException $e) {
            print $e->getMessage() . PHP_EOL;
        }
    }
}
