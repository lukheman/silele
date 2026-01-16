<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\BasisPengetahuan;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Dashboard component displaying system statistics.
 */
class Dashboard extends Component
{
    public int $jumlahPenyakit = 0;

    public int $jumlahGejala = 0;

    public int $jumlahBasisPengetahuan = 0;

    /**
     * Initialize the component with statistics.
     */
    public function mount(): void
    {
        $this->jumlahPenyakit = Penyakit::count();
        $this->jumlahGejala = Gejala::count();
        $this->jumlahBasisPengetahuan = BasisPengetahuan::count();
    }

    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
