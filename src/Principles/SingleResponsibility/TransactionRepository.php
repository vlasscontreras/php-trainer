<?php

namespace Trainer\Principles\SingleResponsibility;

use stdClass;

class TransactionRepository implements RepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function all(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function find(int $id): object
    {
        return new stdClass();
    }

    /**
     * @inheritdoc
     */
    public function where(string $field, string $operator, mixed $value): self
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function get(): array
    {
        return [];
    }
}
