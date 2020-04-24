<?php

namespace Donparapidos\Horizon\SupervisorCommands;

use Donparapidos\Horizon\Contracts\Restartable;

class Restart
{
    /**
     * Process the command.
     *
     * @param  \Donparapidos\Horizon\Contracts\Restartable  $restartable
     * @return void
     */
    public function process(Restartable $restartable)
    {
        $restartable->restart();
    }
}
