<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\BasisPengetahuan;
use App\Models\RiwayatDiagnosis;
use Livewire\Component;

class Dashboard extends Component
{
    public ?int $jumlahPenyakit;
    public ?int $jumlahGejala;
    public ?int $jumlahBasisPengetahuan;
    public ?int $jumlahRiwayatDiagnosis;

    public function mount() {

        $this->jumlahPenyakit = Penyakit::count();
        $this->jumlahGejala = Gejala::count();
        $this->jumlahBasisPengetahuan = BasisPengetahuan::count();

        if (auth()->user()->role === 'admin') {
            $this->jumlahRiwayatDiagnosis = RiwayatDiagnosis::count();
        } else {
            $this->jumlahRiwayatDiagnosis = auth()->user()->riwayatDiagnosis()->count();
        }

    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
