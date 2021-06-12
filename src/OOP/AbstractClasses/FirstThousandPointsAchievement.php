<?php

namespace Trainer\OOP\AbstractClasses;

class FirstThousandPointsAchievement extends AchievementType
{
    /**
     * @inheritdoc
     */
    public function setQualifier(string $user): string
    {
        return "$this->emoji $user has achieved the medium milestone!";
    }
}
