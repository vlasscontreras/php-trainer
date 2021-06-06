<?php

namespace Trainer\General\WeakMaps;

use stdClass;
use Trainer\ExecutableInterface;
use WeakMap;

class WeakMaps implements ExecutableInterface
{
    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $object = new stdClass();
        $store = new WeakMap();

        $store[$object] = 'Anything';

        // Now the object is in the map.
        print_r($store);

        // If we remove the object, it will be garbage-collected.
        unset($object);

        // Hence, removed from the map.
        print_r($store);
    }
}
