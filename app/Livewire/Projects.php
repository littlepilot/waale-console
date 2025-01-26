<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Projects extends Component
{
    public function render()
    {
        return view('livewire.projects', [
            'projects' => Auth::user()->projects()
                ->with('lastDeployment')
                ->get()
                ->sortByDesc(function ($project) {
                    return $project->lastDeployment?->created_at?->timestamp
                        ?? $project->updated_at->timestamp
                        ?? $project->created_at->timestamp;
                })
                ->take(12)
        ]);
    }
}
