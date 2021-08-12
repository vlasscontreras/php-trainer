<?php

namespace Trainer\XML\DOMDocument;

use Trainer\Executable;

class Build extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'xml:dom:build';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $domDocument = new \DomDocument();
        $tasks = $domDocument->createElement('Tasks');

        for ($i = 0; $i < 10; $i++) {
            $what = $i === 4 ? "Gotta repeat #$i before #8" : "Task #$i";

            // Create the XML element.
            $task = $domDocument->createElement('Task', $what); // Needs to happen on the same $domDocument.

            // Add attributes.
            $task->setAttribute('is-odd', ($i % 2) ? 'true' : 'false');
            $task->setAttribute('required', (bool)random_int(0, 1) ? 'true' : 'false');

            $tasks->appendChild($task);
        }

        // Clone (deeply to get the text) the 4th task.
        $toBeRepeated = $tasks->childNodes->item(4)->cloneNode(true);

        // Insert it before the 8th
        $tasks->insertBefore($toBeRepeated, $tasks->childNodes->item(8));

        // Add to the main document.
        $domDocument->appendChild($tasks);

        // Formatting for the console.
        $domDocument->formatOutput = true;

        echo $domDocument->saveXML();
    }
}
