<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\JobReleased;
use Donparapidos\Horizon\Contracts\JobRepository;

class MarkJobAsReleased
{
    /**
     * The job repository implementation.
     *
     * @var \Donparapidos\Horizon\Contracts\JobRepository
     */
    public $jobs;

    /**
     * Create a new listener instance.
     *
     * @param  \Donparapidos\Horizon\Contracts\JobRepository  $jobs
     * @return void
     */
    public function __construct(JobRepository $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * Handle the event.
     *
     * @param  \Donparapidos\Horizon\Events\JobReleased  $event
     * @return void
     */
    public function handle(JobReleased $event)
    {
        $this->jobs->released($event->connectionName, $event->queue, $event->payload);
    }
}
