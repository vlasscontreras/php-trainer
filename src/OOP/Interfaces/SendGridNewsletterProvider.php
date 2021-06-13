<?php

namespace Trainer\OOP\Interfaces;

class SendGridNewsletterProvider implements NewsletterProvider
{
    /**
     * @inheritdoc
     */
    public function subscribe(string $email): bool
    {
        echo "Subscribing $email through SendGrid.";

        return true;
    }
}
