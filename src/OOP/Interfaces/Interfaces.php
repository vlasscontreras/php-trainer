<?php

namespace Trainer\OOP\Interfaces;

use Trainer\Executable;

class Interfaces extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'oop:interfaces';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        /**
         * The controller expects an interface implementation (yet
         * not a specific concretion), and SendGrid is one of them.
         */
        $provider = new SendGridNewsletterProvider();
        $controller = new NewsletterController($provider);
        $controller->store('john@doe.com'); // We know by contract it has this method.
        echo PHP_EOL;

        // We can also use a MailChimp provider.
        $provider = new MailChimpNewsletterProvider();
        $controller = new NewsletterController($provider);
        $controller->store('john@doe.com'); // We know by contract this one also has this method.
        echo PHP_EOL;

        // Or even Campaign Monitor, it also adheres to the contract terms.
        $provider = new CampaignMonitorNewsletterProvider();
        $controller = new NewsletterController($provider);
        $controller->store('john@doe.com'); // Of course it has it.
        echo PHP_EOL;
    }
}
