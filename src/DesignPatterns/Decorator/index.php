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

include './vendor/autoload.php';

use Training\DesignPatterns\Decorator\BasicInspection;
use Training\DesignPatterns\Decorator\OilChangeDecorator;
use Training\DesignPatterns\Decorator\TireRotationDecorator;

// The class that needs additional bahavior.
$basicInspection = new BasicInspection();

// Decorator 1.
$oilChange = new OilChangeDecorator($basicInspection);
var_dump($oilChange->getDescription()); // Has the description of the 2 services.
var_dump($oilChange->getCost()); // Has the cost of the 2 services.

// Decorator 2.
$tireRotation = new TireRotationDecorator($oilChange);

var_dump($tireRotation->getDescription()); // Has the description of the 3 services.
var_dump($tireRotation->getCost()); // Has the cost of the 3 services.
