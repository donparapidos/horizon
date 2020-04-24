<?php

namespace Donparapidos\Horizon\Tests\Feature\Fixtures;

use Donparapidos\Horizon\Tests\Feature\Fakes\SupervisorWithFakeMonitor;

class FakeSupervisorFactory
{
    public $supervisor;

    public function make($options)
    {
        return $this->supervisor = new SupervisorWithFakeMonitor($options);
    }
}
