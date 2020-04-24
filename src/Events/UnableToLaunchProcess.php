<?php

namespace Donparapidos\Horizon\Events;

use Donparapidos\Horizon\WorkerProcess;

class UnableToLaunchProcess
{
    /**
     * The worker process instance.
     *
     * @var \Donparapidos\Horizon\WorkerProcess
     */
    public $process;

    /**
     * Create a new event instance.
     *
     * @param  \Donparapidos\Horizon\WorkerProcess  $process
     * @return void
     */
    public function __construct(WorkerProcess $process)
    {
        $this->process = $process;
    }
}
