<?php

namespace Donparapidos\Horizon\Tests\Feature\Fakes;

use Donparapidos\Horizon\Supervisor;

class SupervisorWithFakeMonitor extends Supervisor
{
    public $monitoring = false;

    /**
     * {@inheritdoc}
     */
    public function monitor()
    {
        $this->monitoring = true;
    }
}
