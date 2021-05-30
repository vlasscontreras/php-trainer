<?php

namespace Trainer\DesignPatterns\TemplateMethod;

class TurkeySub extends Sub
{
    /**
     * Add the turkey
     *
     * @return Sub
     */
    protected function addPrimaryToppings(): Sub
    {
        echo 'Add turkey 🦃' . PHP_EOL;
        return $this;
    }
}
