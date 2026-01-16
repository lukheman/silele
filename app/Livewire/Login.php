<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

/**
 * Login component for user authentication.
 */
#[Layout('layouts.guest')]
#[Title('Login')]
class Login extends Component
{
    #[Rule(['required', 'email', 'exists:users,email'])]
    public string $email = '';

    #[Rule(['required'])]
    public string $password = '';

    /**
     * Attempt to authenticate the user.
     */
    public function login(): ?Redirector
    {
        $this->validate();

        if (Auth::attempt($this->all())) {
            return $this->redirectRoute('dashboard');
        }

        $this->addError('login', 'Email atau password salah');

        return null;
    }

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar.',
            'password.required' => 'Password harus diisi.',
        ];
    }

    public function render(): View
    {
        return view('livewire.login');
    }
}
