<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\JobPushed;
use Donparapidos\Horizon\Contracts\TagRepository;

class StoreMonitoredTags
{
    /**
     * The tag repository implementation.
     *
     * @var \Donparapidos\Horizon\Contracts\TagRepository
     */
    public $tags;

    /**
     * Create a new listener instance.
     *
     * @param  \Donparapidos\Horizon\Contracts\TagRepository  $tags
     * @return void
     */
    public function __construct(TagRepository $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Handle the event.
     *
     * @param  \Donparapidos\Horizon\Events\JobPushed  $event
     * @return void
     */
    public function handle(JobPushed $event)
    {
        $monitoring = $this->tags->monitored($event->payload->tags());

        if (! empty($monitoring)) {
            $this->tags->add($event->payload->id(), $monitoring);
        }
    }
}
