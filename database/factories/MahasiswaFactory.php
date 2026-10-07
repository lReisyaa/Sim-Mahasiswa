<?php

namespace Database\Factories;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nim'           => fake()->unique()->numerify('22########'),
            'nama'          => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'tanggal_lahir' => fake()->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
            'alamat'        => fake()->address(),
            'telepon'       => fake()->numerify('08##########'),
            'email'         => fake()->unique()->safeEmail(),
            'prodi_id'      => Prodi::inRandomOrder()->value('id'),
        ];
    }
}