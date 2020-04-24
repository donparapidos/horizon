<?php

namespace Donparapidos\Horizon\Tests\Feature;

use Mockery;
use Cake\Chronos\Chronos;
use Donparapidos\Horizon\MasterSupervisor;
use Donparapidos\Horizon\Tests\IntegrationTest;
use Donparapidos\Horizon\Contracts\JobRepository;
use Donparapidos\Horizon\Listeners\TrimRecentJobs;
use Donparapidos\Horizon\Events\MasterSupervisorLooped;

class TrimRecentJobsTest extends IntegrationTest
{
    public function test_trimmer_has_a_cooldown_period()
    {
        $trim = new TrimRecentJobs;

        $repository = Mockery::mock(JobRepository::class);
        $repository->shouldReceive('trimRecentJobs')->twice();
        $this->app->instance(JobRepository::class, $repository);

        // Should not be called first time since date is initialized...
        $trim->handle(new MasterSupervisorLooped(Mockery::mock(MasterSupervisor::class)));

        Chronos::setTestNow(Chronos::now()->addMinutes(30));

        // Should only be called twice...
        $trim->handle(new MasterSupervisorLooped(Mockery::mock(MasterSupervisor::class)));
        $trim->handle(new MasterSupervisorLooped(Mockery::mock(MasterSupervisor::class)));
        $trim->handle(new MasterSupervisorLooped(Mockery::mock(MasterSupervisor::class)));

        Chronos::setTestNow();
    }
}
