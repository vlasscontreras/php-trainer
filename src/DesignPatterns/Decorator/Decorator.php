<?php

/**
 * The decorator pattern
 *
 * When a class needs to interact with another class without breaking
 * the OCP, we make use of decorators.
 *
 * Decorators are classes which constructors wrap another objects who
 * are intances of the same interface, and add behavior to have this
 * wrapped object into accuount.
 */

namespace Training\DesignPatterns\Decorator;

use Training\DesignPatterns\Decorator\BasicInspection;
use Training\DesignPatterns\Decorator\OilChangeDecorator;
use Training\DesignPatterns\Decorator\TireRotationDecorator;
use Training\ExecutableInterface;

class Decorator implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // The class that needs additional bahavior.
        $basicInspection = new BasicInspection();

        // Decorator 1.
        $oilChange = new OilChangeDecorator($basicInspection);
        echo $oilChange->getDescription() . PHP_EOL; // Has the description of the 2 services.
        echo $oilChange->getCost() . PHP_EOL; // Has the cost of the 2 services.

        // Decorator 2.
        $tireRotation = new TireRotationDecorator($oilChange);

        echo $tireRotation->getDescription() . PHP_EOL; // Has the description of the 3 services.
        echo $tireRotation->getCost() . PHP_EOL; // Has the cost of the 3 services.
    }
}
