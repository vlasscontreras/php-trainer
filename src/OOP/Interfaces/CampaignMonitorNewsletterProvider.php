<?php

namespace Trainer\OOP\Interfaces;

class CampaignMonitorNewsletterProvider implements NewsletterProvider
{
    /**
     * @inheritdoc
     */
    public function subscribe(string $email): bool
    {
        echo "Subscribing $email through Campaign Monitor.";

        return true;
    }
}
