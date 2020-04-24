<?php

namespace Donparapidos\Horizon\Http\Controllers;

use Donparapidos\Horizon\Contracts\SupervisorRepository;
use Donparapidos\Horizon\Contracts\MasterSupervisorRepository;

class MasterSupervisorController extends Controller
{
    /**
     * Get all of the master supervisors and their underlying supervisors.
     *
     * @param  \Donparapidos\Horizon\Contracts\MasterSupervisorRepository  $masters
     * @param  \Donparapidos\Horizon\Contracts\SupervisorRepository  $supervisors
     * @return \Illuminate\Support\Collection
     */
    public function index(MasterSupervisorRepository $masters,
                          SupervisorRepository $supervisors)
    {
        $masters = collect($masters->all())->keyBy('name')->sortBy('name');

        $supervisors = collect($supervisors->all())->sortBy('name')->groupBy('master');

        return $masters->each(function ($master, $name) use ($supervisors) {
            $master->supervisors = $supervisors->get($name);
        });
    }
}
