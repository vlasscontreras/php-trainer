<?php

/**
 * Single Responsibility Principle
 *
 * This principle dictates that each class should do just one thing.
 */

namespace Trainer\Principles\SingleResponsibility;

use DateTime;
use Trainer\Executable;

class SingleResponsibility extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'principle:single-responsibility';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        // The sales reporter just takes care of the data.
        $salesReport = new SalesReporter();

        // The HTML class just takes care of rendering in HTML.
        $formatter = new HtmlOutput();
        echo $salesReport->between(new DateTime(), new DateTime(), $formatter);
        echo PHP_EOL;

        // The Plain class just takes care of rendering in plain text.
        $formatter = new PlainOutput();
        echo $salesReport->between(new DateTime(), new DateTime(), $formatter);
        echo PHP_EOL;
    }
}
