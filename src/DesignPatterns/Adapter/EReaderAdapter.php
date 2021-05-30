<?php

namespace Training\DesignPatterns\Adapter;

use Training\DesignPatterns\Adapter\BookInterface;

class EReaderAdapter implements BookInterface
{
    /**
     * The eReader object
     *
     * @var EReaderInterface
     */
    protected EReaderInterface $eReader;

    /**
     * Set up the eReader adapter
     *
     * @param EReaderInterface $eReader
     * @return void
     */
    public function __construct(EReaderInterface $eReader)
    {
        $this->eReader = $eReader;
    }

    /**
     * @inheritdoc
     */
    public function open(): string
    {
        return $this->eReader->turnOn(); // The equivalent e-reader method.
    }

    /**
     * @inheritdoc
     */
    public function turnPage(): string
    {
        return $this->eReader->goToNextPage(); // The equivalent e-reader method.
    }
}
