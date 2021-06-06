<?php

// phpcs:disable

namespace Trainer\General\NamedParameters;

use DateTime;

class Invoice
{
    /**
     * Set up invoice
     *
     * @param int $amount
     * @param string $description
     * @param DateTime $chargeDate
     * @param bool $paid
     */
    public function __construct(
        protected int $amount,
        protected string $description,
        protected DateTime $chargeDate,
        protected bool $paid
    ) {
    }
}
