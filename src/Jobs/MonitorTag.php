<?php

namespace Donparapidos\Horizon\Jobs;

use Donparapidos\Horizon\Contracts\TagRepository;

class MonitorTag
{
    /**
     * The tag to monitor.
     *
     * @var string
     */
    public $tag;

    /**
     * Create a new job instance.
     *
     * @param  string  $tag
     * @return void
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Execute the job.
     *
     * @param  \Donparapidos\Horizon\Contracts\TagRepository  $tags
     * @return void
     */
    public function handle(TagRepository $tags)
    {
        $tags->monitor($this->tag);
    }
}
