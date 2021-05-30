<?php

namespace Training\DesignPatterns\Decorator;

interface CarServiceInterface
{
    /**
     * Get the service cost in cents
     *
     * @return int
     */
    public function getCost(): int;

    /**
     * Get the service description
     *
     * @return string
     */
    public function getDescription(): string;
}
