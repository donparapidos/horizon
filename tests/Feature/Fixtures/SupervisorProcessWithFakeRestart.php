<?php

namespace Donparapidos\Horizon\Tests\Feature\Fixtures;

use Donparapidos\Horizon\SupervisorProcess;

class SupervisorProcessWithFakeRestart extends SupervisorProcess
{
    public $wasRestarted = false;

    public function restart()
    {
        $this->wasRestarted = true;
    }
}
