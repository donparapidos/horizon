<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Stopwatch;
use Donparapidos\Horizon\Events\JobReserved;

class StartTimingJob
{
    /**
     * The stopwatch instance.
     *
     * @var \Donparapidos\Horizon\Stopwatch
     */
    public $watch;

    /**
     * Create a new listener instance.
     *
     * @param  \Donparapidos\Horizon\Stopwatch  $watch
     * @return void
     */
    public function __construct(Stopwatch $watch)
    {
        $this->watch = $watch;
    }

    /**
     * Handle the event.
     *
     * @param  \Donparapidos\Horizon\Events\JobReserved  $event
     * @return void
     */
    public function handle(JobReserved $event)
    {
        $this->watch->start($event->payload->id());
    }
}
