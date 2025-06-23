<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penyakit>
 */
class PenyakitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'kode' => $this->faker->unique()->regexify('P[0-9]{3}'),
            'nama' => $this->faker->words(2, true),
            'probabilitas' => $this->faker->randomFloat(2, 0, 1), // probabilitas antara 0 dan 1 dengan 2 desimal
            'deskripsi' => $this->faker->paragraph(),
            'solusi' => $this->faker->paragraph(),
        ];
    }
}
