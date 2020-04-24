<?php

namespace Donparapidos\Horizon;

class SupervisorFactory
{
    /**
     * Create a new supervisor instance.
     *
     * @param  \Donparapidos\Horizon\SupervisorOptions  $options
     * @return \Donparapidos\Horizon\Supervisor
     */
    public function make(SupervisorOptions $options)
    {
        return new Supervisor($options);
    }
}
