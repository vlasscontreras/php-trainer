<?php

namespace Trainer\Principles\InterfaceSegregation;

interface SleepableInterface
{
    /**
     * Make this entity sleep
     *
     * @return void
     */
    public function sleep(): void;
}
