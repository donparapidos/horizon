<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\JobFailed;
use Donparapidos\Horizon\Contracts\JobRepository;

class MarkJobAsFailed
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
     * @param  \Donparapidos\Horizon\Events\JobFailed  $event
     * @return void
     */
    public function handle(JobFailed $event)
    {
        $this->jobs->failed(
            $event->exception, $event->connectionName,
            $event->queue, $event->payload
        );
    }
}
