<?php

namespace Donparapidos\Horizon\SupervisorCommands;

use Donparapidos\Horizon\Supervisor;

class Scale
{
    /**
     * Process the command.
     *
     * @param  \Donparapidos\Horizon\Supervisor  $supervisor
     * @param  array  $options
     * @return void
     */
    public function process(Supervisor $supervisor, array $options)
    {
        $supervisor->scale($options['scale']);
    }
}
