<?php

namespace Trainer\Principles\InterfaceSegregation;

interface ManageableInterface
{
    /**
     * Manage this entity
     *
     * @return void
     */
    public function manage(): void;
}
