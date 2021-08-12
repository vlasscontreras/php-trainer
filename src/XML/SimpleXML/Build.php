<?php

namespace Trainer\XML\SimpleXML;

use Trainer\Executable;

class Build extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'xml:simple:build';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $tasks = new \SimpleXMLElement('<Tasks></Tasks>');

        for ($i = 0; $i < 10; $i++) {
            $what = $i === 4 ? "Gotta repeat #$i before #8" : "Task #$i";

            // Create the XML element adding it to the main document.
            $task = $tasks->addChild('Task', $what);

            // Add attributes.
            $task->addAttribute('is-odd', ($i % 2) ? 'true' : 'false');
            $task->addAttribute('required', (bool)random_int(0, 1) ? 'true' : 'false');
        }

        /**
         * Notes
         *
         * - The SimpleXML library does not support node cloning. We
         *   have to use the DOMDocument class instead, for which you
         *   have an example in Trainer\XML\DOMDocument\Build.
         *
         * - The SimpleXML library does not support formatting the
         *   output. We have to use the DOMDocument class instead, so
         *   you can see the sample example mentioned above.
         */
        echo $tasks->asXML();
    }
}
