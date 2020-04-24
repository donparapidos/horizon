<?php

namespace Donparapidos\Horizon\Events;

use Donparapidos\Horizon\SupervisorProcess;

class SupervisorProcessRestarting
{
    /**
     * The supervisor process instance.
     *
     * @var \Donparapidos\Horizon\SupervisorProcess
     */
    public $process;

    /**
     * Create a new event instance.
     *
     * @param  \Donparapidos\Horizon\SupervisorProcess  $process
     * @return void
     */
    public function __construct(SupervisorProcess $process)
    {
        $this->process = $process;
    }
}
