<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Penyakit;
use Illuminate\Support\Facades\Storage;

/**
 * Form object for Penyakit CRUD operations.
 */
class PenyakitForm extends Form
{
    public ?Penyakit $penyakit = null;

    public string $kode = '';

    #[Validate('required')]
    public string $nama = '';

    #[Validate('nullable')]
    public ?string $deskripsi = '';

    #[Validate('nullable')]
    public ?string $solusi = '';

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|string|null */
    public $photo;

    /**
     * Validation rules.
     *
     * @return array<string, mixed>
     */
    protected function rules(): array
    {
        return [
            'kode' => [
                'required',
                Rule::unique('penyakit', 'kode')->ignore($this->penyakit?->id),
            ],
            'photo' => ['nullable', 'image', 'max:2048'], // Max 2MB
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    protected function messages(): array
    {
        return [
            'kode.unique' => 'Kode penyakit telah digunakan',
            'kode.required' => 'Kode penyakit belum ada',
            'nama.required' => 'Nama penyakit belum ada',
            'photo.image' => 'File yang diunggah harus berupa gambar.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
        ];
    }

    /**
     * Create a new penyakit record.
     */
    public function store(): void
    {
        $penyakit = Penyakit::create($this->validate());

        if ($this->photo && is_object($this->photo)) {
            $path = $this->photo->store('photos', 'public');
            $penyakit->update(['photo' => $path]);
        }

        $this->reset();
    }

    /**
     * Update an existing penyakit record.
     */
    public function update(): void
    {
        $this->validate();

        $this->penyakit->update([
            'kode' => $this->kode,
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'solusi' => $this->solusi,
        ]);

        if ($this->photo && is_object($this->photo)) {
            // Delete old photo if exists
            if ($this->penyakit->photo) {
                Storage::disk('public')->delete($this->penyakit->photo);
            }
            // Store new photo
            $path = $this->photo->store('photos', 'public');
            $this->penyakit->update(['photo' => $path]);
        }

        $this->reset();
    }

    /**
     * Delete the penyakit record.
     */
    public function delete(): void
    {
        $this->penyakit->delete();
        $this->reset();
    }
}
