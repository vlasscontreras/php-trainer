<?php

namespace Trainer\DesignPatterns\Decorator;

class BasicInspection implements CarServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getCost(): int
    {
        return 2500;
    }

    /**
     * @inheritdoc
     */
    public function getDescription(): string
    {
        return 'Basic inspection';
    }
}
