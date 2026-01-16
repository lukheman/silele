<?php

namespace App\Helpers;

use App\Models\Gejala;
use App\Models\Penyakit;
use RuntimeException;

/**
 * Kelas NaiveBayes
 *
 * Digunakan untuk melakukan diagnosis penyakit berdasarkan gejala
 * dengan menggunakan metode Naive Bayes sederhana.
 */
class NaiveBayes
{
    /** @var int Jumlah total gejala yang tersedia */
    public int $jumlah_gejala;

    /**
     * @var array<int,float>
     * Menyimpan hasil probabilitas penyakit berdasarkan gejala.
     * Contoh: [1 => 0.85]
     */
    public array $set_probabilitas_penyakit = [];

    /** @var array<int> ID gejala yang dipilih untuk diagnosis */
    public array $idGejalaDipilih;

    /** @var float Nilai probabilitas awal (prior probability) penyakit */
    private float $p;

    /** @var int Jumlah gejala dalam dataset */
    private int $m;

    /**
     * @var array<int,float>
     * Menyimpan probabilitas setiap penyakit.
     * Contoh: [1 => 0.131, 2 => 0.121]
     */
    private array $probabilitasPenyakit = [];

    /**
     * Konstruktor untuk inisialisasi NaiveBayes.
     *
     * @param array<int> $idGejalaDipilih Daftar ID gejala yang dipilih.
     *
     * @throws RuntimeException Jika tidak ada penyakit dalam database.
     */
    public function __construct(array $idGejalaDipilih)
    {
        $this->jumlah_gejala = Gejala::query()->count();
        $this->idGejalaDipilih = $idGejalaDipilih;

        $penyakitCount = Penyakit::count();

        // Prevent division by zero
        if ($penyakitCount === 0) {
            throw new RuntimeException('Tidak ada data penyakit dalam database.');
        }

        $this->p = 1 / $penyakitCount;
        $this->m = Gejala::count();
    }

    /**
     * Melakukan diagnosis berdasarkan gejala yang dipilih.
     *
     * Proses:
     * 1. Ambil semua penyakit beserta gejalanya dari database.
     * 2. Hitung probabilitas gejala untuk setiap penyakit.
     * 3. Hitung probabilitas akhir untuk setiap penyakit.
     * 4. Ambil hasil dengan probabilitas terbesar.
     *
     * @return Penyakit Penyakit dengan probabilitas terbesar.
     *
     * @throws RuntimeException Jika tidak dapat menentukan diagnosis.
     */
    public function diagnosis(): Penyakit
    {
        $semuaPenyakit = Penyakit::with('gejala')->get();

        if ($semuaPenyakit->isEmpty()) {
            throw new RuntimeException('Tidak ada data penyakit untuk diagnosis.');
        }

        foreach ($semuaPenyakit as $penyakit) {
            $himpunanProbabilitasGejalaPenyakit = [];

            foreach ($this->idGejalaDipilih as $idGejala) {
                // Hitung Nc (apakah penyakit punya gejala tertentu)
                $nc = $penyakit->gejala->contains($idGejala) ? 1 : 0;

                // Rumus probabilitas gejala
                $probabilitasGejala = round(($nc + $this->m * $this->p) / (1 + $this->m), 4);

                $himpunanProbabilitasGejalaPenyakit[] = $probabilitasGejala;
            }

            // Probabilitas penyakit = hasil kali semua probabilitas gejala
            $this->probabilitasPenyakit[$penyakit->id] =
                round(array_product($himpunanProbabilitasGejalaPenyakit), 6);
        }

        return $this->probabilitasTerbesarPenyakit();
    }

    /**
     * Mengambil penyakit dengan probabilitas terbesar.
     *
     * @return Penyakit Penyakit dengan probabilitas terbesar, termasuk nilai probabilitas dan persentasenya.
     *
     * @throws RuntimeException Jika tidak ada hasil probabilitas.
     */
    private function probabilitasTerbesarPenyakit(): Penyakit
    {
        if (empty($this->probabilitasPenyakit)) {
            throw new RuntimeException('Tidak ada hasil probabilitas untuk dievaluasi.');
        }

        $idPenyakitTerbesar = array_keys(
            $this->probabilitasPenyakit,
            max($this->probabilitasPenyakit)
        )[0];

        $maxValue = $this->probabilitasPenyakit[$idPenyakitTerbesar];

        $penyakit = Penyakit::query()->find($idPenyakitTerbesar);

        if ($penyakit === null) {
            throw new RuntimeException('Penyakit dengan ID terbesar tidak ditemukan.');
        }

        $penyakit->probabilitas = $maxValue;
        $penyakit->persentase = $maxValue * 100;

        return $penyakit;
    }
}
