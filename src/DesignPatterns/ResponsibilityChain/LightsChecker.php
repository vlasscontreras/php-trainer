<?php

namespace Trainer\DesignPatterns\ResponsibilityChain;

use Exception;
use Trainer\DesignPatterns\ResponsibilityChain\HomeChecker;
use Trainer\DesignPatterns\ResponsibilityChain\HomeStatus;

class LightsChecker extends HomeChecker
{
    /**
     * @inheritdoc
     */
    public function check(HomeStatus $homeStatus): void
    {
        if ($homeStatus->getLightsStatus()) {
            throw new Exception('Lights are on! 💡');
        }

        $this->next($homeStatus);
    }
}
