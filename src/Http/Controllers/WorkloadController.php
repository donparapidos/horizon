<?php

namespace Donparapidos\Horizon\Http\Controllers;

use Donparapidos\Horizon\Contracts\WorkloadRepository;

class WorkloadController extends Controller
{
    /**
     * Get the current queue workload for the application.
     *
     * @param  \Donparapidos\Horizon\Contracts\WorkloadRepository  $workload
     * @return array
     */
    public function index(WorkloadRepository $workload)
    {
        return collect($workload->get())->sortBy('name')->values()->toArray();
    }
}
