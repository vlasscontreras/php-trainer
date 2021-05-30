<?php

namespace Trainer\DesignPatterns\TemplateMethod;

abstract class Sub
{
    /**
     * Make a sub
     *
     * @return Sub
     */
    public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    /**
     * Lay the bread
     *
     * @return Sub
     */
    final protected function layBread(): self
    {
        echo 'Lay bread 🥖' . PHP_EOL;
        return $this;
    }

    /**
     * Add lettuce
     *
     * @return Sub
     */
    final protected function addLettuce(): self
    {
        echo 'Add lettuce 🥬' . PHP_EOL;
        return $this;
    }

    /**
     * Add sub type-specific toppings
     *
     * @return Sub
     */
    abstract protected function addPrimaryToppings(): self;

    /**
     * Add sources
     *
     * @return Sub
     */
    final protected function addSauces(): self
    {
        echo 'Add sauces 🥫' . PHP_EOL;
        return $this;
    }
}
