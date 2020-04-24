<?php

namespace Donparapidos\Horizon\Events;

use Donparapidos\Horizon\MasterSupervisor;

class MasterSupervisorLooped
{
    /**
     * The master supervisor instance.
     *
     * @var \Donparapidos\Horizon\MasterSupervisor
     */
    public $master;

    /**
     * Create a new event instance.
     *
     * @param  \Donparapidos\Horizon\MasterSupervisor  $master
     * @return void
     */
    public function __construct(MasterSupervisor $master)
    {
        $this->master = $master;
    }
}
