<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama.
     */
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();

        $totalLakiLaki = Mahasiswa::where(
            'jenis_kelamin',
            'Laki-laki'
        )->count();

        $totalPerempuan = Mahasiswa::where(
            'jenis_kelamin',
            'Perempuan'
        )->count();

        $totalProdi = Prodi::count();

        $mahasiswaTerbaru = Mahasiswa::with('prodi')
            ->latest()
            ->take(5)
            ->get();

        $mahasiswaPerProdi = Prodi::withCount('mahasiswas')
            ->orderByDesc('mahasiswas_count')
            ->get();

        return view('dashboard', compact(
            'totalMahasiswa',
            'totalLakiLaki',
            'totalPerempuan',
            'totalProdi',
            'mahasiswaTerbaru',
            'mahasiswaPerProdi'
        ));
    }
}