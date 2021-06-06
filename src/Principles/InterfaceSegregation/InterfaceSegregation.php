<?php

/**
 * Interface Segregation
 *
 * This principle dictates clients should not be forced to implement
 * an interface they don't use. This can be interpreted and
 * implemented thinking on the knowledge each class need from each
 * other.
 *
 * If a class `TypeA` only needs a little portion of data or behavior
 * of a given object, that's when this principle suggests to
 * segregate the implementation and only ask for an abstraction or
 * interface `InterfaceA`, so any class implementing it, can be used
 * by `TypeA`, since what the `InterfaceA` contract introduces, is
 * all what we need.
 */

namespace Trainer\Principles\InterfaceSegregation;

use Trainer\Executable;

class InterfaceSegregation extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'principle:interface-segregation';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $captain = new Captain();

        /**
         * The captain doesn't need to know if you sleep, just that
         * you can work.
         */
        $captain->manage(new AndroidWorker());

        /**
         * Nonehtless, Humans can sleep, and they do while being
         * managed, but it doesn't mean all other workers should also
         * sleep.
         */
        $captain->manage(new HumanWorker());
    }
}
