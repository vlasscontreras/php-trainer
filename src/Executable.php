<?php

namespace Trainer;

abstract class Executable
{
    /**
     * Command signature
     *
     * @var string
     */
    public const SIGNATURE = '';

    /**
     * Run the exercise
     *
     * @return void
     */
    abstract public static function run();
}
