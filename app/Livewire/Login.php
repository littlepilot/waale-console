<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Rule(['required', 'email', 'exists:users,email'])]
    public string $email;

    #[Rule(['required'])]
    public string $password;

    #[Rule(['nullable'])]
    public bool $remember;

    public function login(): void
    {
        $validated = $this->validate();

        $user = User::where('email', $validated['email'])
            ->first();

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], $validated['remember'])) {
            Auth::login($user, $validated['remember']); ;
        }

        $this->redirectRoute('home');
    }

    #[Title('Sign In')]
    #[Layout('components.layouts.signing')]
    public function render(): View
    {
        return view('livewire.login');
    }
}
