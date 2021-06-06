<?php

/**
 * The Open-Closed Principle
 *
 * This principle dictates that classes must be closed for
 * modification but open for extension.
 */

namespace Trainer\Principles\OpenClosed;

use Trainer\Executable;

class OpenClosed extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'principle:open-closed';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $receipt = new Receipt(1000);

        /**
         * The checkout class can make you pay with any method, but
         * you don't need to modify the class to accept new methods.
         */
        $checkout = new Checkout();

        // Instead, we send implementations of an interface.
        $stripe = new StripePaymentGateway();
        $checkout->pay($receipt, $stripe);
        echo PHP_EOL;

        // This one works too!
        $paypal = new PayPalPaymentGateway();
        $checkout->pay($receipt, $paypal);
        echo PHP_EOL;
    }
}
