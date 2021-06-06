<?php

namespace Trainer\Principles\SingleResponsibility;

interface OutputInterface
{
    /**
     * Render output
     *
     * @param string $value
     * @return void
     */
    public function render(string $value): void;
}
