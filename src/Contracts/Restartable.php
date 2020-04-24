<?php

namespace Donparapidos\Horizon\Contracts;

interface Restartable
{
    /**
     * Restart the process.
     *
     * @return void
     */
    public function restart();
}
