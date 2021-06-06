<?php

namespace Trainer\Principles\LiskovSubstitution;

class FileLessonRepository implements LessonRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function all(): array
    {
        return [];
    }
}
