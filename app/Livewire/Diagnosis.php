<?php

namespace App\Livewire;

use App\Helpers\NaiveBayes;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Traits\HasNotify;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Diagnosis extends Component
{
    use HasNotify;

    public $selectedGejala = [];
    public $showHasil = false;

    public ?Penyakit $diagnosaPenyakit;

    #[Computed]
    public function gejala()
    {
        return Gejala::query()->orderBy('kode')->get();
    }

    public function startDiagnosis()
    {
        if (empty($this->selectedGejala)) {
            $this->notifyError('Pilih minimal satu gejala!');
            return;
        }

        // Pastikan selectedGejala adalah array integer
        $gejalaIds = array_map('intval', $this->selectedGejala);

        $NB = new NaiveBayes($gejalaIds);

        $this->diagnosaPenyakit = $NB->diagnosis();

        $this->showHasil = true;
    }

    public function resetDiagnosis()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.diagnosis');
    }
}
