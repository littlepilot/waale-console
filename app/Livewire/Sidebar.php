<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public function logout()
    {
        Auth::logout();

        $this->redirectRoute('login');
    }

    public function render()
    {
        return view('livewire.sidebar', [
            'items' => [
                ['label' => 'Projects', 'path' => '/projects', 'icon' => 'projects'],
                ['label' => 'Deployments', 'path' => '/deployments', 'icon' => 'deployments'],
                ['label' => 'Domains', 'path' => '/domains', 'icon' => 'domains'],
                ['label' => 'Activity', 'path' => '/activity', 'icon' => 'activity'],
                ['label' => 'Usage', 'path' => '/usage', 'icon' => 'usage'],
                ['label' => 'Settings', 'path' => '/settings', 'icon' => 'settings'],
            ],
        ]);
    }
}
