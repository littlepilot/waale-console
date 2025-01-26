<?php

namespace App\Livewire;

use App\Models\Deployment;
use App\Models\Project;
use Livewire\Component;

class ProjectAndDeploymentStats extends Component
{
    public function render()
    {
        $projectCount = Project::count();
        $deploymentCount = Deployment::count();
        $successDeploymentCount = Deployment::where('status', 'deployed')->count();
        $averageDeploymentDuration = random_int(60, 70);
        $successRate = $successDeploymentCount / $deploymentCount * 100;

        return view('livewire.project-and-deployment-stats', compact(
            'projectCount',
            'deploymentCount',
            'successRate',
            'averageDeploymentDuration'
        ));
    }
}
