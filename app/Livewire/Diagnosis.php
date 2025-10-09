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
    public ?float $probabilitas;

    public ?Penyakit $diagnosaPenyakit;

    #[Computed]
    public function gejala() {
        return Gejala::all();
    }

    public function startDiagnosis() {
        $NB = new NaiveBayes($this->selectedGejala);

        $this->diagnosaPenyakit = $NB->diagnosis();

        $this->showHasil = true;
        $this->simpanHasilDiagnosis();
    }

    public function resetDiagnosis() {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.diagnosis');
    }
}
