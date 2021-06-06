<?php

namespace Trainer\Principles\InterfaceSegregation;

interface WorkableInterface
{
    /**
     * Make this entity work
     *
     * @return void
     */
    public function work(): void;
}
