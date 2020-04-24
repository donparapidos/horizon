<?php

namespace Donparapidos\Horizon\Http\Controllers;

use Donparapidos\Horizon\Jobs\RetryFailedJob;

class RetryController extends Controller
{
    /**
     * Retry a failed job.
     *
     * @param  string  $id
     * @return void
     */
    public function store($id)
    {
        dispatch(new RetryFailedJob($id));
    }
}
