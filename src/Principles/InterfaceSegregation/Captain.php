<?php

namespace Trainer\Principles\InterfaceSegregation;

class Captain
{
    /**
     * Manage crew
     *
     * @param ManageableInterface $worker
     * @return void
     */
    public function manage(ManageableInterface $worker)
    {
        $worker->manage();
    }
}
