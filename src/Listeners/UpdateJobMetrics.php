<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Stopwatch;
use Donparapidos\Horizon\Events\JobDeleted;
use Donparapidos\Horizon\Contracts\MetricsRepository;

class UpdateJobMetrics
{
    /**
     * The metrics repository implementation.
     *
     * @var \Donparapidos\Horizon\Contracts\MetricsRepository
     */
    public $metrics;

    /**
     * The stopwatch instance.
     *
     * @var \Donparapidos\Horizon\Stopwatch
     */
    public $watch;

    /**
     * Create a new listener instance.
     *
     * @param  \Donparapidos\Horizon\Contracts\MetricsRepository  $metrics
     * @param  \Donparapidos\Horizon\Stopwatch  $watch
     * @return void
     */
    public function __construct(MetricsRepository $metrics, Stopwatch $watch)
    {
        $this->watch = $watch;
        $this->metrics = $metrics;
    }

    /**
     * Stop gathering metrics for a job.
     *
     * @param  \Donparapidos\Horizon\Events\JobDeleted  $event
     * @return void
     */
    public function handle(JobDeleted $event)
    {
        if ($event->job->hasFailed()) {
            return;
        }

        $time = $this->watch->check($event->payload->id());

        $this->metrics->incrementQueue(
            $event->job->getQueue(), $time
        );

        $this->metrics->incrementJob(
            $event->payload->commandName(), $time
        );
    }
}
