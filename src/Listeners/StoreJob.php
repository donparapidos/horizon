<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\JobPushed;
use Donparapidos\Horizon\Contracts\JobRepository;

class StoreJob
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
     * @param  \Donparapidos\Horizon\Events\JobPushed  $event
     * @return void
     */
    public function handle(JobPushed $event)
    {
        $this->jobs->pushed(
            $event->connectionName, $event->queue, $event->payload
        );
    }
}
