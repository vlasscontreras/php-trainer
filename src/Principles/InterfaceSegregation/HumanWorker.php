<?php

namespace Trainer\Principles\InterfaceSegregation;

class HumanWorker implements WorkableInterface, SleepableInterface, ManageableInterface
{
    /**
     * @inheritdoc
     */
    public function work(): void
    {
        echo 'Human working 💪🏻' . PHP_EOL;
    }

    /**
     * @inheritdoc
     */
    public function sleep(): void
    {
        echo 'Human sleeping 😴' . PHP_EOL;
    }

    /**
     * @inheritdoc
     */
    public function manage(): void
    {
        // For humans, be managed means work and sleep.
        $this->work();
        $this->sleep();
    }
}
