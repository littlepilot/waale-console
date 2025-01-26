<?php

namespace App\Livewire;

use App\Models\Deployment;
use Livewire\Component;

class DashboardLastDeployment extends Component
{
    public function render()
    {
        return view('livewire.dashboard-last-deployment', [
            'deployment' => Deployment::latest()
                ->with(['project'])
                ->first()
        ]);
    }
}
