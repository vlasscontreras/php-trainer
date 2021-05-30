<?php

namespace Trainer\DesignPatterns\TemplateMethod;

class VeggieSub extends Sub
{
    /**
     * Add the veggies
     *
     * @return Sub
     */
    protected function addPrimaryToppings(): Sub
    {
        echo 'Add some veggies 🥗' . PHP_EOL;
        return $this;
    }
}
