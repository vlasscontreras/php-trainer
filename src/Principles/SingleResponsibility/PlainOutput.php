<?php

namespace Trainer\Principles\SingleResponsibility;

class PlainOutput implements OutputInterface
{
    /**
     * @inheritdoc
     */
    public function render(string $value): void
    {
        echo $value;
    }
}
