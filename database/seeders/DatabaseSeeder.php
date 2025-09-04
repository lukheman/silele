<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Penyakit;
use App\Models\Gejala;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 5 penyakit
        $penyakits = Penyakit::factory()->count(5)->create();
        // Buat 15 gejala
        $gejalas = Gejala::factory()->count(15)->create();

        // Mapping aturan dari tabel
        // Key = nomor gejala, value = array id penyakit yang terhubung
        $aturan = [
            1  => [1, 4, 5],        // G1 -> P001, P004, P005
            2  => [1, 2, 3],        // G2 -> P001, P002, P003
            3  => [2, 3],           // G3 -> P002, P003
            4  => [1],              // G4 -> P001
            5  => [1],              // G5 -> P001
            6  => [2, 4],           // G6 -> P002, P004
            7  => [2],              // G7 -> P002
            8  => [3],              // G8 -> P003
            9  => [3],              // G9 -> P003
            10 => [3],              // G10 -> P003
            11 => [1, 2, 3, 4],     // G11 -> P001, P002, P003, P004
            12 => [2, 4],           // G12 -> P002, P004
            13 => [1, 4],           // G13 -> P001, P004
            14 => [5],              // G14 -> P005
            15 => [1],              // G15 -> P001
        ];

        // Hubungkan sesuai mapping
        foreach ($aturan as $gejalaId => $penyakitIds) {
            $gejala = $gejalas[$gejalaId - 1]; // karena index array mulai dari 0
            $gejala->penyakit()->attach($penyakitIds);
        }

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Peternak 1',
            'email' => 'peternak1@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'peternak'
        ]);

    }
}
