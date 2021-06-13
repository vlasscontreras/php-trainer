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
        /**
         * This constructor implements a concept called Object Composition
         *
         * Despite we're using an interface as parameter type (and class property)
         * we're actually expecting an implementation of that interface.
         *
         * This class does not care about the specifics of each newsletter
         * provider, just that it can subscribe an email. The reason being, we
         * don't really want to put things like "unsubscribe from MailChimp" or
         * "unsubscribe from SendGrid", it just doesn't fit the purpose of this
         * class. Object composition helps us to avoid that.
         */
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
