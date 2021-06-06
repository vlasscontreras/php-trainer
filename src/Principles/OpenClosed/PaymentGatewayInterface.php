<?php

namespace Trainer\Principles\OpenClosed;

interface PaymentGatewayInterface
{
    /**
     * Make a charge
     *
     * @param int $amount
     * @return bool
     */
    public function charge(int $amount): bool;
}
