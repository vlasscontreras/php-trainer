<?php

namespace Trainer\DesignPatterns\Adapter;

use Trainer\DesignPatterns\Adapter\EReaderInterface;

class Kindle implements EReaderInterface
{
    /**
     * @inheritdoc
     */
    public function turnOn(): string
    {
        return 'Turning Kindle on';
    }

    /**
     * @inheritdoc
     */
    public function goToNextPage(): string
    {
        return 'Go to next Kindle page';
    }
}
