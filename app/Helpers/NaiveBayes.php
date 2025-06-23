<?php

namespace App\Helpers;

use App\Models\Gejala;
use App\Models\Penyakit;

class NaiveBayes {

    public int $jumlah_gejala;
    public array $set_probabilitas_penyakit = [];
    public $konfigurasi;

    public function __construct($konfigurasi) {
        $this->jumlah_gejala = Gejala::count();
        $this->konfigurasi = $konfigurasi;
    }

    public function diagnosis() {

        foreach ($this->konfigurasi as $kode_penyakit => $gejala) {
            $probabilitas_penyakit = Penyakit::where('kode', $kode_penyakit)->first()->probabilitas;

            $probabilitas_gejala = [];
            foreach ($gejala as $kode_gejala => $is_exist) {
                $probabilitas = $this->getProbabilitasGejala($probabilitas_penyakit, $is_exist);
                array_push($probabilitas_gejala, $probabilitas);
            }
            $this->probabilitasPenyakit($kode_penyakit, $probabilitas_gejala);
        }

        $result = $this->probabilitasTerbesarPenyakit();
        return $result;

    }

    /**
     * Mengembalikan kode penyakit dengan probabilitas terbesar dari set_probabilitas_penyakit.
     *
     * Contoh return value:
     * [
     *     'P01' => 0.85
     * ]
     */
    public function probabilitasTerbesarPenyakit() {
        $max = 0;
        $kode_penyakit = null;

        foreach ($this->set_probabilitas_penyakit as $key => $value) {
            if($value > $max) {
                $max = $value;
                $kode_penyakit = $key;
            }
        }

        return [$kode_penyakit => $max];
    }

    /**
     * Menghitung probabilitas gejala berdasarkan penyakit.
     *
     * Contoh penggunaan:
     * $probabilitas = $obj->probabilitasGejalaBerdasarkanPenyakit('P001', 'G001', 0.2, 1);
     *
     * Contoh return value:
     * Jika $this->jumlah_gejala = 15, $probabilitas_penyakit = 0.2, $gejala_is_exist = 1
     * Maka hasilnya:
     * (1 + 15 * 0.2) / (1 + 15) = 0.25
     *
     */
    public function getProbabilitasGejala( float $probabilitas_penyakit, bool|int $gejala_is_exist): float {
        return ($gejala_is_exist + $this->jumlah_gejala * $probabilitas_penyakit) /
               (1 + $this->jumlah_gejala);
    }

    /**
     * Contoh penggunaan:
     *
     * $kode_penyakit = 'P001';
     * $probabilitas_gejala = [0.2, 0.2, 0.2];
     *
     * $hasil = $this->probabilitasPenyakit($kode_penyakit, $probabilitas_gejala);
     * $hasil sekarang berisi hasil perkalian semua probabilitas gejala
     *
     * Dalam contoh di atas:
     * $hasil = 0.2 * 0.2 * 0.2 = 0.008
     */
    public function probabilitasPenyakit(
        string $kode_penyakit,
        array $probabilitas_gejala
    ): float {
        $hasil = 1;
        foreach ($probabilitas_gejala as $p) {
            $hasil *= $p;
        }

        $this->set_probabilitas_penyakit[$kode_penyakit] = $hasil;
        return $hasil;
    }

}

/* // Inisialisasi */
/* $NB = new NaiveBayes(15); */
/**/
/* $set_probabilitas_penyakit = [ */
/*     'P1' => 0.2, */
/*     'P2' => 0.2, */
/*     'P3' => 0.2, */
/*     'P4' => 0.2, */
/*     'P5' => 0.2, */
/* ]; */
/**/
/* $set_probabilitas_gejala_berdasarkan_penyakit = []; */
/**/
/* $set_probabilitas_gejala_berdasarkan_penyakit['P1'] = [ */
/*     'G2'  => $NB->probabilitasGejalaBerdasarkanPenyakit('P1', 'G2', 0.2, 1), */
/*     'G3'  => $NB->probabilitasGejalaBerdasarkanPenyakit('P1', 'G3', 0.2, 1), */
/*     'G7'  => $NB->probabilitasGejalaBerdasarkanPenyakit('P1', 'G7', 0.2, 0), */
/*     'G14' => $NB->probabilitasGejalaBerdasarkanPenyakit('P1', 'G14', 0.2, 0), */
/* ]; */
/**/
/* $set_probabilitas_gejala_berdasarkan_penyakit['P2'] = [ */
/*     'G2'  => $NB->probabilitasGejalaBerdasarkanPenyakit('P2', 'G2', 0.2, 1), */
/*     'G3'  => $NB->probabilitasGejalaBerdasarkanPenyakit('P2', 'G3', 0.2, 1), */
/*     'G7'  => $NB->probabilitasGejalaBerdasarkanPenyakit('P2', 'G7', 0.2, 1), */
/*     'G14' => $NB->probabilitasGejalaBerdasarkanPenyakit('P2', 'G14', 0.2, 0), */
/* ]; */
/**/
/* $hasil_probabilitas_P1 = $NB->probabilitasPenyakit('P1', $set_probabilitas_gejala_berdasarkan_penyakit['P1']); */
/* $hasil_probabilitas_P2 = $NB->probabilitasPenyakit('P2', $set_probabilitas_gejala_berdasarkan_penyakit['P2']); */
/**/
/* // Cetak hasil */
/* echo "Probabilitas Gejala Berdasarkan Penyakit:\n"; */
/* print_r($set_probabilitas_gejala_berdasarkan_penyakit); */
/**/
/* echo "\nProbabilitas Akhir Penyakit:\n"; */
/* print_r($NB->set_probabilitas_penyakit); */
/**/
/* print_r($NB->probabilitasTerbesarPenyakit()); */
