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

    /**
     * Melakukan diagnosis berdasarkan konfigurasi gejala dan penyakit.
     *
     * Proses:
     * 1. Melakukan iterasi pada setiap penyakit yang ada di konfigurasi.
     * 2. Mengambil probabilitas penyakit dari database.
     * 3. Menghitung probabilitas setiap gejala untuk penyakit tersebut.
     * 4. Menyimpan hasil probabilitas penyakit berdasarkan gejala.
     * 5. Mengambil hasil diagnosis dengan probabilitas terbesar.
     *
     * Contoh return value:
     * [
     *     'P01' => 0.85
     * ]
     */
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
