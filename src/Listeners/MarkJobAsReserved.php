<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\JobReserved;
use Donparapidos\Horizon\Contracts\JobRepository;

class MarkJobAsReserved
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
     * @param  \Donparapidos\Horizon\Events\JobReserved  $event
     * @return void
     */
    public function handle(JobReserved $event)
    {
        $this->jobs->reserved($event->connectionName, $event->queue, $event->payload);
    }
}
