<?php

namespace Trainer\OOP\AbstractClasses;

use Trainer\Executable;

class AbstractClasses extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'oop:abstract-classes';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // Abstract classes cannot be instantiated.
        // $achievementType = new AchievementType(); // 😬

        // But subclasses inherit its behavior.
        $firstThousandPoints = new FirstThousandPointsAchievement();
        echo $firstThousandPoints->getName() . PHP_EOL;
        echo $firstThousandPoints->getIconFilename() . PHP_EOL;
        echo $firstThousandPoints->setQualifier('John') . PHP_EOL; // Implements abstract method.

        echo PHP_EOL;

        // And subclasses may even override behavior or attributes.
        $first50Points = new First50PointsAchievement(); // Overrides attribute.
        echo $first50Points->getName() . PHP_EOL; // Overrides this method.
        echo $first50Points->getIconFilename() . PHP_EOL;
        echo $first50Points->setQualifier('John') . PHP_EOL; // Implements abstract method.
    }
}
