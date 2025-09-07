<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Traits\HasNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class BasisPengetahuan extends Component
{
    use HasNotify;
    use WithPagination;

    public $selectedPenyakit = null;

    #[Rule('required')]
    public $selectedGejala = null;


    #[Computed]
    public function penyakit() {
        return Penyakit::paginate(10);
    }

    #[Computed]
    public function gejala() {
        return Gejala::all();
    }

    public function messages(): array {
        return [
            'selectedGejala.required' => 'Pilih Gejala Penyakit'
        ];
    }

    public function saveGejalaPenyakit() {
        // selain menambahakan gejala gejala, juga memperbarui gejaa yang sudah ada
        $this->validate();

        $this->selectedPenyakit->gejala()->syncWithoutDetaching([$this->selectedGejala]);

        $this->notifySuccess('Berhasil memperbarui gejala ke penyakit');

    }

    public function editGejalaPenyakit($id) {
        $this->selectedGejala = $id;
        $gejala = $this->selectedPenyakit->gejala()->find($id);


    }

    public function deleteGejalaPenyakit($id) {
        $this->selectedPenyakit->gejala()->detach($id);
        $this->notifySuccess('Berhasil menghapus gejala dari penyakit');
    }

    public function showGejalaPenyakit($id) {
        $this->selectedPenyakit = Penyakit::with('gejala')->find($id);
        $this->dispatch('open-modal');
    }

    public function render()
    {
        return view('livewire.basis-pengetahuan');
    }
}
