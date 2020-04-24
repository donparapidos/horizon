<?php

namespace Donparapidos\Horizon\Events;

use Donparapidos\Horizon\Supervisor;

class SupervisorLooped
{
    /**
     * The supervisor instance.
     *
     * @var \Donparapidos\Horizon\Supervisor
     */
    public $supervisor;

    /**
     * Create a new event instance.
     *
     * @param  \Donparapidos\Horizon\Supervisor  $supervisor
     * @return void
     */
    public function __construct(Supervisor $supervisor)
    {
        $this->supervisor = $supervisor;
    }
}
