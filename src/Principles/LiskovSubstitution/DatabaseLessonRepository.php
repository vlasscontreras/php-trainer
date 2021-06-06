<?php

namespace Trainer\Principles\LiskovSubstitution;

class DatabaseLessonRepository implements LessonRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function all(): array
    {
        return [];
    }
}
