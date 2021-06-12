<?php

namespace Trainer\OOP\Inheritance;

use Trainer\Executable;

class Inheritance extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'oop:inheritance';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $collection = new VideoCollection([
            new Video('How to make your own Pokemon.', 300),
            new Video('How to become a firefighter.', 4854),
            new Video('How to change the password of my life.', 42),
            new Video('What are neurons and how to get them.', 50345),
        ]);

        echo "Total videos length: {$collection->totalLength()} seconds." . PHP_EOL;
    }
}
