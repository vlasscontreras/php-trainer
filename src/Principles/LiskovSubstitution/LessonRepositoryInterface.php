<?php

namespace Trainer\Principles\LiskovSubstitution;

interface LessonRepositoryInterface
{
    /**
     * Get all lessons
     *
     * @return array
     */
    public function all(): array;
}
