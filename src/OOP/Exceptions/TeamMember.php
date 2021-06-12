<?php

namespace Trainer\OOP\Exceptions;

class TeamMember
{
    /**
     * New team member
     *
     * @param string $name Member name.
     * @return void
     */
    public function __construct(protected string $name)
    {
        //
    }
}
