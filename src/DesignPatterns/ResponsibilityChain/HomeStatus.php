<?php

namespace Trainer\DesignPatterns\ResponsibilityChain;

class HomeStatus
{
    /**
     * Lights status
     *
     * @var bool
     */
    protected bool $lights;

    /**
     * Lock status
     *
     * @var bool
     */
    protected bool $locked;

    /**
     * Alarm status
     *
     * @var bool
     */
    protected bool $alarm;

    /**
     * Set up home status
     *
     * @param bool $lights
     * @param bool $locked
     * @param bool $alarm
     * @return void
     */
    public function __construct(bool $lights, bool $locked, bool $alarm)
    {
        $this->lights = $lights;
        $this->locked = $locked;
        $this->alarm = $alarm;
    }

    /**
     * Get the lights status
     *
     * @return bool
     */
    public function getLightsStatus(): bool
    {
        return $this->lights;
    }

    /**
     * Get the lock status
     *
     * @return bool
     */
    public function getLockStatus(): bool
    {
        return $this->locked;
    }

    /**
     * Get the alarm status
     *
     * @return bool
     */
    public function getAlarmStatus(): bool
    {
        return $this->alarm;
    }
}
