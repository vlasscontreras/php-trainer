<?php

namespace Trainer\OOP\Inheritance;

class VideoCollection extends Collection
{
    /**
     * Get the total length of the videos on this collection.
     *
     * @return int|float
     */
    public function totalLength()
    {
        /**
         * We inherit the ability of getting the sum of values of the
         * given key from the Collection class, but we're wrapping it
         * for a more specific use case: the video duration/length.
         */
        return $this->sum('length');
    }
}
