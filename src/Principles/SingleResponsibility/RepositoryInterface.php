<?php

namespace Trainer\Principles\SingleResponsibility;

interface RepositoryInterface
{
    /**
     * Get all records of this repository.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Find a specific record on this repository
     *
     * @param int $id
     * @return object
     */
    public function find(int $id): object;

    /**
     * Query repository records
     *
     * @param string $field
     * @param string $operator
     * @param mixed $value
     * @return self
     */
    public function where(string $field, string $operator, mixed $value): self;

    /**
     * Get results of query
     *
     * @return array
     */
    public function get(): array;
}
