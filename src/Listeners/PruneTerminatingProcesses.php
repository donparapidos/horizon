<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\SupervisorLooped;

class PruneTerminatingProcesses
{
    /**
     * Handle the event.
     *
     * @param  \Donparapidos\Horizon\Events\SupervisorLooped  $event
     * @return void
     */
    public function handle(SupervisorLooped $event)
    {
        $event->supervisor->pruneTerminatingProcesses();
    }
}
