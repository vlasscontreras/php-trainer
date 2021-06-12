<?php

namespace Trainer\OOP\Inheritance;

class Collection
{
    /**
     * Collection items
     *
     * @var array
     */
    protected array $items = [];

    /**
     * Set up collection
     *
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Get the collection items
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Get the sum of the given column
     *
     * @param string $key
     * @return int|float
     */
    public function sum(string $key): int | float
    {
        return array_sum(
            array_column($this->items, $key)
        );
    }
}
