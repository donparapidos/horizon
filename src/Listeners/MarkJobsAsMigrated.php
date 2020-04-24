<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\JobsMigrated;
use Donparapidos\Horizon\Contracts\JobRepository;

class MarkJobsAsMigrated
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
     * @param  \Donparapidos\Horizon\Events\JobsMigrated  $event
     * @return void
     */
    public function handle(JobsMigrated $event)
    {
        $this->jobs->migrated($event->connectionName, $event->queue, $event->payloads);
    }
}
