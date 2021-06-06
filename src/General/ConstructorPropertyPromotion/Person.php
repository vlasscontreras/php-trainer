<?php

namespace Trainer\General\ConstructorPropertyPromotion;

class Person
{
    /**
     * Person name
     *
     * @var string
     */
    protected string $name;

    /**
     * Set up person
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
