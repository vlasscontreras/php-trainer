<?php

namespace Trainer\Principles\SingleResponsibility;

class HtmlOutput implements OutputInterface
{
    /**
     * @inheritdoc
     */
    public function render(string $value): void
    {
        printf('<h1>%s</h1>', $value);
    }
}
