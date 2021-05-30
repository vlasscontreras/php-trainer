<?php

namespace Trainer\DesignPatterns\ResponsibilityChain;

use Exception;
use Trainer\DesignPatterns\ResponsibilityChain\HomeChecker;
use Trainer\DesignPatterns\ResponsibilityChain\HomeStatus;

class AlarmChecker extends HomeChecker
{
    /**
     * @inheritdoc
     */
    public function check(HomeStatus $homeStatus): void
    {
        if (! $homeStatus->getAlarmStatus()) {
            throw new Exception('The alarm is not set! 🚨');
        }

        $this->next($homeStatus);
    }
}
