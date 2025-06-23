<?php

namespace App\Livewire;

use App\Models\RiwayatDiagnosis as RiwayatDiagnosisModel;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class RiwayatDiagnosis extends Component
{
    use WithPagination;

    #[Computed]
    public function riwayat() {
        if (auth()->user()->role === 'admin') {

            return RiwayatDiagnosisModel::with(['penyakit', 'peternak'])->paginate(10);
        }
        return auth()->user()->riwayatDiagnosis()
            ->with(['penyakit'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.riwayat-diagnosis');
    }
}
