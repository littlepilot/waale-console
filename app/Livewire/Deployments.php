<?php

namespace App\Livewire;

use App\Models\Deployment;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class Deployments extends Component
{
    #[Url('project')]
    public $projectId;

    #[Title('Dashboard | Waale')]
    #[Layout('components.layouts.app')]
    public function render()
    {
        $projects = Auth::user()->projects;

        $selectedProject = $projects->where('id', $this->projectId)->first();

        if ($selectedProject) {
            $deployments = $selectedProject->deployments()
                ->latest()
                ->limit(12)
                ->with(['project'])
                ->get();
        } else {
            $deployments = Deployment::whereIn('project_id', $projects->pluck('id'))
                ->latest()
                ->limit(12)
                ->with(['project'])
                ->get();
        }

        return view('livewire.deployments', [
            'projects' => $projects,
            'selectedProject' => $selectedProject,
            'deployments' => $deployments,
        ]);
    }
}
