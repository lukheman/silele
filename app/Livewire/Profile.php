<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\HasNotify;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

/**
 * Profile management component.
 */
#[Title('Profil')]
class Profile extends Component
{
    use HasNotify;
    use WithFileUploads;

    public User $user;

    public string $name = '';

    public string $email = '';

    public string $password = '';

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $photo;

    /**
     * Initialize the component with current user data.
     */
    public function mount(): void
    {
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    /**
     * Update the user's profile information.
     */
    public function updateProfile(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:6|max:255',
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;

        if (!empty($this->password)) {
            $this->user->password = $this->password; // Model cast handles hashing
        }

        if ($this->user->isDirty()) {
            $this->user->save();
            session()->flash('success', 'Profil berhasil diperbarui.');
            $this->notifySuccess('Profil berhasil diperbarui.');
        } else {
            $this->notifyInfo('Tidak ada perubahan pada profil.');
        }
    }

    /**
     * Update the user's profile photo.
     */
    public function updateProfilePhoto(): void
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        if ($this->photo) {
            // Delete old photo if exists using Storage facade
            if ($this->user->photo) {
                Storage::disk('public')->delete($this->user->photo);
            }

            $path = $this->photo->store('photos', 'public');
            $this->user->photo = $path;
            $this->user->save();
            $this->notifySuccess('Foto profil berhasil diperbarui.');

            // Reload user data
            $this->mount();
        }
    }

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.min' => 'Password minimal 6 karakter.',
        ];
    }

    public function render(): View
    {
        return view('livewire.profile');
    }
}
