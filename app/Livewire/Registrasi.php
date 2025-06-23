<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

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

    public function messages(): array {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Kata sandi tidak boleh kosong',
            'password_confirmation.required' => 'Konfirmasi kata sandi tidak boleh kosong',
            'password_confirmation.same' => 'Kata sandi tidak sama',
        ];
    }

    public function register()
    {
        $this->validate();

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role' => 'peternak', // Hardcoded as per requirement
            ]);

            session()->flash('message', 'Registrasi berhasil! Silakan masuk.');

            $this->reset(['name', 'email', 'password', 'password_confirmation']);

            return redirect()->route('login');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('livewire.registrasi');
    }
}
