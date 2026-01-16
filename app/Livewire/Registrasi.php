<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Features\SupportRedirects\Redirector;

/**
 * Registration component for new user sign-up.
 */
#[Layout('layouts.guest')]
#[Title('Registrasi')]
class Registrasi extends Component
{
    #[Rule(['required', 'string', 'max:255'])]
    public string $name = '';

    #[Rule(['required', 'email', 'unique:users,email'])]
    public string $email = '';

    #[Rule(['required', 'min:6'])]
    public string $password = '';

    #[Rule(['required', 'same:password'])]
    public string $password_confirmation = '';

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Kata sandi tidak boleh kosong',
            'password_confirmation.required' => 'Konfirmasi kata sandi tidak boleh kosong',
            'password_confirmation.same' => 'Kata sandi tidak sama',
        ];
    }

    /**
     * Register a new user.
     */
    public function register(): ?Redirector
    {
        $this->validate();

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password, // Model cast handles hashing
                'role' => 'peternak',
            ]);

            session()->flash('message', 'Registrasi berhasil! Silakan masuk.');

            $this->reset(['name', 'email', 'password', 'password_confirmation']);

            return redirect()->route('login');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.');

            return null;
        }
    }

    public function render(): View
    {
        return view('livewire.registrasi');
    }
}
