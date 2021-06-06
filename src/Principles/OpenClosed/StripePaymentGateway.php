<?php

namespace Trainer\Principles\OpenClosed;

class StripePaymentGateway implements PaymentGatewayInterface
{
    /**
     * @inheritdoc
     */
    public function charge(int $amount): bool
    {
        echo 'Charging user using Stripe...';

        return true;
    }
}
