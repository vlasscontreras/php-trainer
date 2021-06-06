<?php

/**
 * Liskov Substitution Principle
 *
 * This principle dictates that derived classes (implementation of an
 * abstraction or interface) must be substitutable for their base
 * class (anywhere where the abstraction is accepted). Essentially,
 * any LSP-compliant class should have the same contract including
 * return types.
 */

namespace Trainer\Principles\LiskovSubstitution;

use Trainer\Executable;

class LiskovSubstitution extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'principle:liskov-substitution';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $fileReporitory = new FileLessonRepository();
        $databaseRepository = new DatabaseLessonRepository();

        /**
         * We should be able to use either of them since both follow
         * the same contract with the same return types, and all.
         */
        echo self::test($fileReporitory) . PHP_EOL;
        echo self::test($databaseRepository) . PHP_EOL;
    }

    /**
     * Test concept
     *
     * @param LessonRepositoryInterface $repository
     * @return void
     */
    public static function test(LessonRepositoryInterface $repository)
    {
        $array = $repository->all();
        return 'I used ' . $repository::class;
    }
}
