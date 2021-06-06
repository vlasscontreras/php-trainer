<?php

/**
 * The template method design pattern
 *
 * This pattern is used to illustrate the steps of an algorithm in
 * class methods, but implementations might differ in some steps.
 */

namespace Trainer\DesignPatterns\TemplateMethod;

use Trainer\Executable;

class TemplateMethod extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'pattern:template-method';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // Let's see how to make a turkey sub 😋
        $sub = new TurkeySub();
        $sub->make();

        echo PHP_EOL;

        // Now a veggie sub 🥗
        $sub = new VeggieSub();
        $sub->make();
    }
}
