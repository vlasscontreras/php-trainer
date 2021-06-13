<?php

namespace Trainer\OOP\Interfaces;

class NewsletterController
{
    /**
     * Set up controller
     *
     * @param NewsletterProvider $provider
     * @return void
     */
    public function __construct(protected NewsletterProvider $provider)
    {
    }

    /**
     * Subscribe user
     *
     * @param string $email
     * @return void
     */
    public function store(string $email)
    {
        $this->provider->subscribe($email);
    }
}
