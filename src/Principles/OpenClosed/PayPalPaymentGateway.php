<?php

namespace Trainer\Principles\OpenClosed;

class PayPalPaymentGateway implements PaymentGatewayInterface
{
    /**
     * @inheritdoc
     */
    public function charge(int $amount): bool
    {
        echo 'Charging user using PayPal...';

        return true;
    }
}
