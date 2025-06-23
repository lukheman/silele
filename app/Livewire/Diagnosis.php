<?php

namespace App\Livewire;

use App\Helpers\NaiveBayes;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RiwayatDiagnosis;
use App\Traits\HasNotify;
use Livewire\Attributes\Computed;
use Livewire\Component;
use function array_key_first;

class Diagnosis extends Component
{
    use HasNotify;

    public $selectedGejala = [];
    public $diagnosa;
    public $showHasil = false;
    public ?float $probabilitas;

    #[Computed]
    public function gejala() {
        return Gejala::all();
    }

    public function startDiagnosis() {
        $penyakitList = Penyakit::with('gejala')->get(); // Pastikan relasi `gejala` ada
        $allGejala = Gejala::pluck('kode')->toArray(); // Ambil semua kode gejala

        $konfigurasi = [];

        foreach ($penyakitList as $penyakit) {

            $gejalaDiagnosa = []; // ['G1' => 1, 'G2' => 0]

            foreach ($this->selectedGejala as $id_gejala) {

                $hasGejala = $penyakit->gejala->contains('id', $id_gejala);

                // apakah penyakit ini mempunyai gejala dengan $id_gejala
                if($hasGejala) {
                    $gejalaDiagnosa[$id_gejala] = 1;

                } else {

                    $gejalaDiagnosa[$id_gejala] = 0;
                }

            }

            $konfigurasi[$penyakit->kode] = $gejalaDiagnosa;
        }

        $NB = new NaiveBayes($konfigurasi);
        $hasil_diagnosis =$NB->diagnosis();

        $this->diagnosa = Penyakit::where('kode', array_key_first($hasil_diagnosis))->first();
        $this->probabilitas = $hasil_diagnosis[$this->diagnosa->kode];
        $this->showHasil = true;
        $this->simpanHasilDiagnosis();
    }

    public function simpanHasilDiagnosis() {

        RiwayatDiagnosis::create([
            'id_user' => auth()->user()->id,
            'id_penyakit' => $this->diagnosa->id,
            'probabilitas' => $this->probabilitas
        ]);

        $this->notifySuccess('Berhasil melakukan diagnosis dan menyimpan hasil diagnosis');

    }

    public function resetDiagnosis() {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.diagnosis');
    }
}
