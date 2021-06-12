<?php

namespace Trainer\OOP\AbstractClasses;

use ReflectionClass;

abstract class AchievementType
{
    /**
     * Achievement emoji
     *
     * @var string
     */
    public string $emoji = '🏆';

    /**
     * Get the achievment name
     *
     * @return string
     */
    public function getName(): string
    {
        $class = (new ReflectionClass($this))->getShortName();

        return trim(
            preg_replace('/[A-Z]/', ' $0', $class),
        );
    }

    /**
     * Get the achievement icon filename
     *
     * @return string
     */
    public function getIconFilename(): string
    {
        return strtolower(
            preg_replace('/\s/', '-', $this->getName()),
        ) . '.png';
    }

    /**
     * Set qualifier
     *
     * @param string $user
     * @return string
     */
    abstract public function setQualifier(string $user): string;
}
