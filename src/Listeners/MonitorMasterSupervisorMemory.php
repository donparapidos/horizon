<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\MasterSupervisorLooped;

class MonitorMasterSupervisorMemory
{
    /**
     * Handle the event.
     *
     * @param  \Donparapidos\Horizon\Events\MasterSupervisorLooped  $event
     * @return void
     */
    public function handle(MasterSupervisorLooped $event)
    {
        $master = $event->master;

        if ($master->memoryUsage() > 64) {
            $master->terminate(12);
        }
    }
}
