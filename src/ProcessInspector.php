<?php

namespace Donparapidos\Horizon;

use Donparapidos\Horizon\Contracts\SupervisorRepository;
use Donparapidos\Horizon\Contracts\MasterSupervisorRepository;

class ProcessInspector
{
    /**
     * The command executor.
     *
     * @var \Donparapidos\Horizon\Exec
     */
    public $exec;

    /**
     * Create a new process inspector instance.
     *
     * @param  \Donparapidos\Horizon\Exec  $exec
     * @return void
     */
    public function __construct(Exec $exec)
    {
        $this->exec = $exec;
    }

    /**
     * Get the IDs of all Horizon processes running on the system.
     *
     * @return array
     */
    public function current()
    {
        return array_diff(
            $this->exec->run('pgrep -f horizon'),
            $this->exec->run('pgrep -f horizon:purge')
        );
    }

    /**
     * Get an array of running Horizon processes that can't be accounted for.
     *
     * @return array
     */
    public function orphaned()
    {
        return array_diff($this->current(), $this->monitoring());
    }

    /**
     * Get all of the process IDs Horizon is actively monitoring.
     *
     * @return array
     */
    public function monitoring()
    {
        return collect(app(SupervisorRepository::class)->all())
            ->pluck('pid')
            ->pipe(function ($processes) {
                $processes->each(function ($process) use (&$processes) {
                    $processes = $processes->merge($this->exec->run("pgrep -P {$process}"));
                });

                return $processes;
            })
            ->merge(
                array_pluck(app(MasterSupervisorRepository::class)->all(), 'pid')
            )->all();
    }
}
