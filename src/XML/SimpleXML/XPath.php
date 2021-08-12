<?php

namespace Trainer\XML\SimpleXML;

use Trainer\Executable;

class XPath extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'xml:simple:xpath';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $xml = simplexml_load_file(BASEPATH . '/resources/xml/library.xml');

        // Select all the titles
        $results = $xml->xpath("//CD/YEAR");
        self::renderSimpleXmlNodes($results);
        echo PHP_EOL;

        // Select the titles of the CDs of the 90's.
        $results = $xml->xpath("//CD[@era='90s']/TITLE");
        self::renderSimpleXmlNodes($results);
        echo PHP_EOL;

        // Select the titles of the CDs of the 90's.
        $results = $xml->xpath("//CD[@era='60s']/ARTIST");
        self::renderSimpleXmlNodes($results);
    }

    /**
     * Render the SimpleXMLElement list
     *
     * @param \SimpleXMLElement[]|false $results
     * @return void
     */
    protected static function renderSimpleXmlNodes(array | false $results): void
    {
        if (! $results) {
            return;
        }

        $count = count($results);
        echo "I found {$count} elements" . PHP_EOL;

        foreach ($results as $element) {
            echo '[' . $element->getName() . '] ';

            echo $element . PHP_EOL;
        }
    }
}
