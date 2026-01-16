<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Traits\HasNotify;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Component for managing basis pengetahuan (knowledge base).
 * Links diseases with their symptoms.
 */
class BasisPengetahuan extends Component
{
    use HasNotify;
    use WithPagination;

    public ?Penyakit $selectedPenyakit = null;

    #[Rule('required')]
    public ?int $selectedGejala = null;

    /**
     * Get paginated penyakit list.
     *
     * @return LengthAwarePaginator<Penyakit>
     */
    #[Computed]
    public function penyakit(): LengthAwarePaginator
    {
        return Penyakit::paginate(10);
    }

    /**
     * Get all gejala for selection.
     *
     * @return Collection<int, Gejala>
     */
    #[Computed]
    public function gejala(): Collection
    {
        return Gejala::all();
    }

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'selectedGejala.required' => 'Pilih Gejala Penyakit'
        ];
    }

    /**
     * Save a symptom to the selected disease.
     */
    public function saveGejalaPenyakit(): void
    {
        $this->validate();
        $this->selectedPenyakit->gejala()->syncWithoutDetaching([$this->selectedGejala]);
        $this->notifySuccess('Berhasil memperbarui gejala ke penyakit');
    }

    /**
     * Select a symptom for editing.
     */
    public function editGejalaPenyakit(int $id): void
    {
        $this->selectedGejala = $id;
    }

    /**
     * Remove a symptom from the selected disease.
     */
    public function deleteGejalaPenyakit(int $id): void
    {
        $this->selectedPenyakit->gejala()->detach($id);
        $this->notifySuccess('Berhasil menghapus gejala dari penyakit');
    }

    /**
     * Show symptom details for a disease.
     */
    public function showGejalaPenyakit(int $id): void
    {
        $this->selectedPenyakit = Penyakit::with('gejala')->find($id);
        $this->dispatch('open-modal');
    }

    public function render(): View
    {
        return view('livewire.basis-pengetahuan');
    }
}
