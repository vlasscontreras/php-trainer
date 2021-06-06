<?php

namespace Trainer\General\ConstructorPropertyPromotion;

class PromotedPerson
{
    /**
     * Set up person
     *
     * @param string $name
     */
    public function __construct(protected string $name)
    {
    }
}
