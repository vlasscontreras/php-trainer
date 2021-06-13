<?php

namespace Trainer\OOP\Interfaces;

interface NewsletterProvider
{
    /**
     * Subscribe email to newsletter
     *
     * @param string $email
     * @return bool
     */
    public function subscribe(string $email): bool;
}
