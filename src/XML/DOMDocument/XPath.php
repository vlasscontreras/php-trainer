<?php

namespace Trainer\XML\DOMDocument;

use DOMNodeList;
use Trainer\Executable;

class XPath extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'xml:dom:xpath';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $domDocument = new \DomDocument();
        $domDocument->load(BASEPATH . '/resources/xml/library.xml');

        $xpath = new \DomXpath($domDocument);

        // Select all the titles
        $results = $xpath->query("//CD/YEAR");
        self::renderDomNodes($results);
        echo PHP_EOL;

        // Select the titles of the CDs of the 90's.
        $results = $xpath->query("//CD[@era='90s']/TITLE");
        self::renderDomNodes($results);
        echo PHP_EOL;

        // Select the titles of the CDs of the 90's.
        $results = $xpath->query("//CD[@era='60s']/ARTIST");
        self::renderDomNodes($results);
    }

    /**
     * Render the DOMNode list
     *
     * @param \DOMNodeList|false $domNodeList
     * @return void
     */
    protected static function renderDomNodes(\DOMNodeList | false $domNodeList): void
    {
        if (! $domNodeList) {
            return;
        }

        echo "I found {$domNodeList->length} elements" . PHP_EOL;

        foreach ($domNodeList as $element) {
            echo '[' . $element->nodeName . '] ';

            foreach ($element->childNodes as $node) {
                echo $node->nodeValue . PHP_EOL;
            }
        }
    }
}
