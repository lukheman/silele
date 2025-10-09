<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\BasisPengetahuan;
use Livewire\Component;

class Dashboard extends Component
{
    public ?int $jumlahPenyakit;
    public ?int $jumlahGejala;
    public ?int $jumlahBasisPengetahuan;

    public function mount() {

        $this->jumlahPenyakit = Penyakit::count();
        $this->jumlahGejala = Gejala::count();
        $this->jumlahBasisPengetahuan = BasisPengetahuan::count();

    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
