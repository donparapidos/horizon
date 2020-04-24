<?php

namespace Donparapidos\Horizon\SupervisorCommands;

use Donparapidos\Horizon\Contracts\Pausable;

class Pause
{
    /**
     * Process the command.
     *
     * @param  \Donparapidos\Horizon\Contracts\Pausable  $pausable
     * @return void
     */
    public function process(Pausable $pausable)
    {
        $pausable->pause();
    }
}
