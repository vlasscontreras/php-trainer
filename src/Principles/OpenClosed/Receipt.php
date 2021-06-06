<?php

namespace Trainer\Principles\OpenClosed;

class Receipt
{
    /**
     * Receipt amount
     *
     * @var int
     */
    protected int $amount;

    /**
     * Set up receipt
     *
     * @param int $amount
     * @return void
     */
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * Get receipt amount
     *
     * @return  int
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
