<?php

namespace Trainer\DesignPatterns\Decorator;

class TireRotationDecorator implements CarServiceInterface
{
    /**
     * The wrapping service
     *
     * @var CarServiceInterface
     */
    protected CarServiceInterface $service;

    /**
     * Set up service
     *
     * @param CarServiceInterface $service
     * @return void
     */
    public function __construct(CarServiceInterface $service = null)
    {
        $this->service = $service;
    }

    /**
     * @inheritdoc
     */
    public function getCost(): int
    {
        return 3500 + $this->service->getCost();
    }

    /**
     * @inheritdoc
     */
    public function getDescription(): string
    {
        $descriptions = [$this->service->getDescription(), 'Tire rotation'];

        return implode(', ', $descriptions);
    }
}
