<?php

namespace Trainer\OOP\Inheritance;

class Video
{
    /**
     * Set up video
     *
     * @param string $title  Video title.
     * @param int    $length Video duration in seconds.
     * @return void
     */
    public function __construct(public string $title, public int $length)
    {
        //
    }
}
