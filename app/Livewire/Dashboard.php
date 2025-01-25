<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard | Waale')]
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.dashboard');
    }
}
