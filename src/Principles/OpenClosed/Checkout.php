<?php

namespace Trainer\Principles\OpenClosed;

class Checkout
{
    /**
     * Pay
     *
     * @param Receipt $receipt
     * @param PaymentGatewayInterface $paymentGateway
     * @return void
     */
    public function pay(Receipt $receipt, PaymentGatewayInterface $paymentGateway)
    {
        $paymentGateway->charge($receipt->getAmount());
    }
}
