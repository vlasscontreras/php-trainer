<?php

namespace Trainer\Principles\InterfaceSegregation;

class AndroidWorker implements WorkableInterface, ManageableInterface
{
    /**
     * @inheritdoc
     */
    public function work(): void
    {
        echo 'Android working 🦾' . PHP_EOL;
    }

    /**
     * @inheritdoc
     */
    public function manage(): void
    {
        $this->work(); // For Androids, just work.
    }
}
