<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'kode_prodi' => 'TI',
            'nama_prodi' => 'Teknik Informatika',
            'fakultas' => 'Teknologi Informasi',
        ]);
        Prodi::create([
            'kode_prodi' => 'SI',
            'nama_prodi' => 'Sistem Informasi',
            'fakultas' => 'Teknologi Informasi',
        ]);
        Prodi::create([
            'kode_prodi' => 'TE',
            'nama_prodi' => 'Teknik Elektro',
            'fakultas' => 'Teknik',
        ]);
    }
}