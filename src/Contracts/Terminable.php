<?php

namespace Donparapidos\Horizon\Contracts;

interface Terminable
{
    /**
     * Terminate the process.
     *
     * @param  int  $status
     * @return void
     */
    public function terminate($status = 0);
}
