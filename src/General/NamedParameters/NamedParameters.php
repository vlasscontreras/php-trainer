<?php

/**
 * Named Parameters
 *
 * A function or class method with parameters, can be invoked with
 * those paramteres in any order as long as they include the name.
 *
 * Notice that this approach couples the function calls to the actual
 * parameter names in the function definition.
 */

namespace Trainer\General\NamedParameters;

use DateTime;
use Trainer\ExecutableInterface;

class NamedParameters implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // They can have any order.
        $invoice = new Invoice(
            description: 'Web Development Services',
            chargeDate: new DateTime(),
            amount: 1000,
            paid: true,
        );

        print_r($invoice);
    }
}
