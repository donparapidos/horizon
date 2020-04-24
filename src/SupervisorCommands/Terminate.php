<?php

namespace Donparapidos\Horizon\SupervisorCommands;

use Donparapidos\Horizon\Contracts\Terminable;

class Terminate
{
    /**
     * Process the command.
     *
     * @param  \Donparapidos\Horizon\Contracts\Terminable  $terminable
     * @param  array  $options
     * @return void
     */
    public function process(Terminable $terminable, array $options)
    {
        $terminable->terminate($options['status'] ?? 0);
    }
}
