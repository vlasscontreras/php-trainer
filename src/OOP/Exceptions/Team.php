<?php

namespace Trainer\OOP\Exceptions;

class Team
{
    /**
     * Team members
     *
     * @var array
     */
    protected array $members = [];

    /**
     * Set up team
     *
     * @param int $maxMembers Maximum amount of members.
     * @return void
     */
    public function __construct(protected int $maxMembers)
    {
        //
    }

    /**
     * Ad member to a team.
     *
     * @param TeamMember $member
     * @return void
     */
    public function addMember(TeamMember $member)
    {
        /**
         * Check limit before adding
         *
         * Since this method throws an exception, it will bubble all
         * the way up until one of its parent callers handles it. For
         * that reason, we don't need to validate with `if` to stop,
         * because the execution will halt, and the next instruction
         * won't be executed.
         */
        $this->validateLimit();

        $this->members[] = $member;
    }

    /**
     * Get the list of members
     *
     * @return array
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Check if the limit has been reeached
     *
     * @return void
     */
    protected function validateLimit()
    {
        if (count($this->members) < $this->maxMembers) {
            return;
        }

        /**
         * Since exceeding the limit (business logic) is an
         * exceptional behavior, returning false wouldn't be enough
         * to handle this situation. We're adding details through a
         * very specific message (see exception method definition).
         */
        throw TeamException::forMemberLimitExceeded($this->maxMembers);
    }
}
