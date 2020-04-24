<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\JobDeleted;
use Donparapidos\Horizon\Contracts\JobRepository;
use Donparapidos\Horizon\Contracts\TagRepository;

class MarkJobAsComplete
{
    /**
     * The job repository implementation.
     *
     * @var \Donparapidos\Horizon\Contracts\JobRepository
     */
    public $jobs;

    /**
     * The tag repository implementation.
     *
     * @var \Donparapidos\Horizon\Contracts\TagRepository
     */
    public $tags;

    /**
     * Create a new listener instance.
     *
     * @param  \Donparapidos\Horizon\Contracts\JobRepository  $jobs
     * @param  \Donparapidos\Horizon\Contracts\TagRepository  $tags
     * @return void
     */
    public function __construct(JobRepository $jobs, TagRepository $tags)
    {
        $this->jobs = $jobs;
        $this->tags = $tags;
    }

    /**
     * Handle the event.
     *
     * @param  \Donparapidos\Horizon\Events\JobDeleted  $event
     * @return void
     */
    public function handle(JobDeleted $event)
    {
        $this->jobs->completed($event->payload, $event->job->hasFailed());

        if (! $event->job->hasFailed() && count($this->tags->monitored($event->payload->tags())) > 0) {
            $this->jobs->remember($event->connectionName, $event->queue, $event->payload);
        }
    }
}
