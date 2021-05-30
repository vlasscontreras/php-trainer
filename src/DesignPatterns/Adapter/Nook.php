<?php

namespace Training\DesignPatterns\Adapter;

use Training\DesignPatterns\Adapter\EReaderInterface;

class Nook implements EReaderInterface
{
    /**
     * @inheritdoc
     */
    public function turnOn(): string
    {
        return 'Turning Nook on';
    }

    /**
     * @inheritdoc
     */
    public function goToNextPage(): string
    {
        return 'Go to next Nook page';
    }
}
