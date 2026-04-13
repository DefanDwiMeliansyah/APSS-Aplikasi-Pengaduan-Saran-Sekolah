<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lokasi>
 */
class LokasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lokasi' => $this->faker->randomElement([
                'LAB PPLG 1',
                'LAB PPLG 2',
                'LAB PPLG 3',
                'Ruang Kelas XII PPLG A',
                'Ruang Kelas XII PPLG B',
                'Perpustakaan',
                'Toilet Lantai 1',
                'Kantin',
                'Mushola',
            ]),
        ];
    }
}
