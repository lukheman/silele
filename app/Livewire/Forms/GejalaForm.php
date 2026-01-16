<?php

namespace App\Livewire\Forms;

use App\Models\Gejala;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Form;

/**
 * Form object for Gejala CRUD operations.
 */
class GejalaForm extends Form
{
    public ?Gejala $gejala = null;

    public string $kode = '';

    #[Validate('required')]
    public string $nama = '';

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
                Rule::unique('gejala', 'kode')->ignore($this->gejala?->id),
            ],
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
            'kode.unique' => 'Kode gejala telah digunakan',
            'kode.required' => 'Kode gejala belum ada',
            'nama.required' => 'Nama gejala belum ada'
        ];
    }

    /**
     * Create a new gejala record.
     */
    public function store(): void
    {
        Gejala::create($this->validate());
        $this->reset();
    }

    /**
     * Update an existing gejala record.
     */
    public function update(): void
    {
        $this->gejala->update($this->validate());
        $this->reset();
    }

    /**
     * Delete the gejala record.
     */
    public function delete(): void
    {
        $this->gejala->delete();
        $this->reset();
    }
}
