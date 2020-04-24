<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Events\JobFailed;
use Donparapidos\Horizon\Contracts\TagRepository;

class StoreTagsForFailedJob
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
     * @param  \Donparapidos\Horizon\Events\JobFailed  $event
     * @return void
     */
    public function handle(JobFailed $event)
    {
        $tags = collect($event->payload->tags())->map(function ($tag) {
            return 'failed:'.$tag;
        })->all();

        $this->tags->addTemporary(
            2880, $event->payload->id(), $tags
        );
    }
}
