<?php

namespace Trainer\OOP\AbstractClasses;

class First50PointsAchievement extends AchievementType
{
    /**
     * @inheritdoc
     */
    public string $emoji = '🐣';

    /**
     * Overriding because the parent class doesn't handle numbers in
     * class names correctly, we can correct/adapt in subclass, and
     * even use the original function as base so we don't repeat the
     * same steps.
     *
     * @return string
     */
    public function getName(): string
    {
        $class = parent::getName();

        return trim(
            preg_replace('/[0-9]+/', ' $0', $class),
        );
    }

    /**
     * @inheritdoc
     */
    public function setQualifier(string $user): string
    {
        return "$this->emoji $user has achieved the newbie milestone!";
    }
}
