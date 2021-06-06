<?php

namespace Trainer\General\ConstructorPropertyPromotion;

use Trainer\Executable;

class ConstructorPropertyPromotion extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'constructor-property-promotion';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $person = new Person('John Doe');
        print_r($person);

        $promotedPerson = new PromotedPerson('John Doe');
        print_r($promotedPerson);
    }
}
