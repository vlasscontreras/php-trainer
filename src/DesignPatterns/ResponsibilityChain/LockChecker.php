<?php

namespace Trainer\DesignPatterns\ResponsibilityChain;

use Exception;
use Trainer\DesignPatterns\ResponsibilityChain\HomeChecker;
use Trainer\DesignPatterns\ResponsibilityChain\HomeStatus;

class LockChecker extends HomeChecker
{
    /**
     * @inheritdoc
     */
    public function check(HomeStatus $homeStatus): void
    {
        if (! $homeStatus->getLockStatus()) {
            throw new Exception('Doors are not locked! 🔓');
        }

        $this->next($homeStatus);
    }
}
