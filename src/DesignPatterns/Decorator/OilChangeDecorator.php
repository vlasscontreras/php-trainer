<?php

namespace Training\DesignPatterns\Decorator;

class OilChangeDecorator implements CarServiceInterface
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
    public function __construct(CarServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @inheritdoc
     */
    public function getCost(): int
    {
        return 5000 + $this->service->getCost();
    }

    /**
     * @inheritdoc
     */
    public function getDescription(): string
    {
        $descriptions = [$this->service->getDescription(), 'Oil change'];

        return implode(', ', $descriptions);
    }
}
