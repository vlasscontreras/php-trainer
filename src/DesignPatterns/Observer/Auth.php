<?php

namespace Trainer\DesignPatterns\Observer;

use Trainer\DesignPatterns\Observer\Subjectable;

class Auth
{
    use Subjectable;

    /**
     * Log in to the application
     *
     * @param string $username
     * @return void
     */
    public function login(string $username)
    {
        // Do magic.
        // Let's pretend we're loging the user in...
        // Uh, this action is quit tricky...
        // Sessions, wow!..
        // Ok, you're you, you shall pass.

        // Notify observers.
        $this->notify();
    }
}
