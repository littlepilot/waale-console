<?php

namespace App\Livewire;

use App\Models\Deployment;
use Livewire\Component;

class DeploymentSummary extends Component
{
    public Deployment $deployment;

    public function render()
    {
        return view('livewire.deployment-summary');
    }
}
