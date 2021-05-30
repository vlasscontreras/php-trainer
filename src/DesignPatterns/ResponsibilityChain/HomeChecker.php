<?php

namespace Trainer\DesignPatterns\ResponsibilityChain;

use Exception;

abstract class HomeChecker
{
    /**
     * Successor
     *
     * @var HomeChecker
     */
    protected HomeChecker $successor;

    /**
     * Set successor
     *
     * @param HomeChecker $successor
     * @return void
     */
    public function setSuccessor(HomeChecker $successor): void
    {
        $this->successor = $successor;
    }

    /**
     * Check the home status
     *
     * @param HomeStatus $successor
     * @return bool
     * @throws \Exception
     */
    abstract public function check(HomeStatus $successor): void;

    /**
     * Go to next checker
     *
     * @param HomeStatus $homeStatus
     * @return void
     * @throws Exception
     */
    public function next(HomeStatus $homeStatus): void
    {
        if (isset($this->successor)) {
            $this->successor->check($homeStatus);
        }
    }
}
