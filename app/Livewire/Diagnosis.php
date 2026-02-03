<?php

namespace App\Livewire;

use App\Helpers\NaiveBayes;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Traits\HasNotify;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * Livewire component for disease diagnosis based on symptoms.
 */
class Diagnosis extends Component
{
    use HasNotify;

    /** @var array<int, int|string> */
    public array $selectedGejala = [];

    public bool $showHasil = false;

    /** @var SupportCollection<int, Penyakit>|null Semua hasil diagnosis */
    public ?SupportCollection $hasilDiagnosis = null;

    /**
     * Get all symptoms for selection.
     *
     * @return Collection<int, Gejala>
     */
    #[Computed]
    public function gejala(): Collection
    {
        return Gejala::query()->orderBy('kode')->get();
    }

    /**
     * Start the diagnosis process with selected symptoms.
     */
    public function startDiagnosis(): void
    {
        if (empty($this->selectedGejala)) {
            $this->notifyError('Pilih minimal satu gejala!');
            return;
        }

        // Pastikan selectedGejala adalah array integer
        $gejalaIds = array_map('intval', $this->selectedGejala);

        $NB = new NaiveBayes($gejalaIds);

        // Ambil semua hasil diagnosis
        $this->hasilDiagnosis = $NB->diagnosisAll();

        $this->showHasil = true;
    }

    /**
     * Reset the diagnosis form.
     */
    public function resetDiagnosis(): void
    {
        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.diagnosis');
    }
}
