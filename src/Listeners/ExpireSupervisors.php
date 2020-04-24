<?php

namespace Donparapidos\Horizon\Listeners;

use Cake\Chronos\Chronos;
use Donparapidos\Horizon\Events\MasterSupervisorLooped;
use Donparapidos\Horizon\Contracts\SupervisorRepository;
use Donparapidos\Horizon\Contracts\MasterSupervisorRepository;

class ExpireSupervisors
{
    /**
     * Handle the event.
     *
     * @param  \Donparapidos\Horizon\Events\MasterSupervisorLooped  $event
     * @return void
     */
    public function handle(MasterSupervisorLooped $event)
    {
        app(MasterSupervisorRepository::class)->flushExpired();

        app(SupervisorRepository::class)->flushExpired();
    }
}
