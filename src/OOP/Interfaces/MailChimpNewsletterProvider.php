<?php

namespace Trainer\OOP\Interfaces;

class MailChimpNewsletterProvider implements NewsletterProvider
{
    /**
     * @inheritdoc
     */
    public function subscribe(string $email): bool
    {
        echo "Subscribing $email through MailChimp.";

        return true;
    }
}
