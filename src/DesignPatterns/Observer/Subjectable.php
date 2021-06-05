<?php

namespace Trainer\DesignPatterns\Observer;

use Exception;

trait Subjectable
{
    /**
     * List of observers attached to this subject
     *
     * @var ObserverInterface[]
     */
    protected array $observers = [];

    /**
     * Attach an observer to this subject
     *
     * @param ObserverInterface[] $observer
     * @return self
     */
    public function attach(ObserverInterface | array $observer): self
    {
        if (is_array($observer)) {
            $this->attachObservers($observer);
        } else {
            $this->observers[] = $observer;
        }

        return $this;
    }

    /**
     * Attach array of observers
     *
     * @param array $observers
     * @return void
     * @throws Exception
     */
    public function attachObservers(array $observers)
    {
        foreach ($observers as $observer) {
            if (! $observer instanceof ObserverInterface) {
                throw new Exception('Observers must instances of the ObservableInterface.');
            }

            $this->attach($observer);
        }
    }

    /**
     * Detach an observer from this subject
     *
     * @param int $index
     * @return self
     */
    public function detach(int $index): self
    {
        unset($this->observers[$index]);

        return $this;
    }

    /**
     * Notify all the observers attached to this subject
     *
     * @return void
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }
}
