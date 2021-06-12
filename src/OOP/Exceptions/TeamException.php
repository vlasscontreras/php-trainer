<?php

namespace Trainer\OOP\Exceptions;

use Exception;

class TeamException extends Exception
{
    /**
     * Exception for member limit exceeded
     *
     * This is called a static constructor, btw 🤓
     *
     * @param int $limit
     * @return never
     */
    public static function forMemberLimitExceeded(int $limit)
    {
        throw new static("You may only add up to $limit members to this team.");
    }
}
