<?php

namespace Donparapidos\Horizon\Http\Controllers;

use Donparapidos\Horizon\Contracts\MetricsRepository;

class QueueMetricsController extends Controller
{
    /**
     * The metrics repository implementation.
     *
     * @var \Donparapidos\Horizon\Contracts\MetricsRepository
     */
    public $metrics;

    /**
     * Create a new controller instance.
     *
     * @param  \Donparapidos\Horizon\Contracts\MetricsRepository  $metrics
     * @return void
     */
    public function __construct(MetricsRepository $metrics)
    {
        parent::__construct();

        $this->metrics = $metrics;
    }

    /**
     * Get all of the measured queues.
     *
     * @return array
     */
    public function index()
    {
        return $this->metrics->measuredQueues();
    }

    /**
     * Get metrics for a given queue.
     *
     * @param  string  $slug
     * @return \Illuminate\Support\Collection
     */
    public function show($slug)
    {
        return collect($this->metrics->snapshotsForQueue($slug))->map(function ($record) {
            $record->runtime = ceil($record->runtime / 1000);
            $record->throughput = (int) $record->throughput;

            return $record;
        });
    }
}
