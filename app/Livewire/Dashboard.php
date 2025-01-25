<?php

namespace App\Livewire;

use App\Models\Deployment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard | Waale')]
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.dashboard', [
            'deployments' => Deployment::whereIn('project_id', Auth::user()->projects->pluck('id'))
                ->latest()
                ->limit(12)
                ->with(['project'])
                ->get(),
        ]);
    }
}
