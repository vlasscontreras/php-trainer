<?php

namespace Trainer\General\UnionTypes;

use DateTime;

class User
{
    /**
     * Cancel user account
     *
     * @param string|DateTime $when
     * @return void
     */
    public function cancel(string | DateTime $when)
    {
        print_r($when);
    }
}
