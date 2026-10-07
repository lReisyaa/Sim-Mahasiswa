<?php 
 
namespace Database\Seeders; 
 
use App\Models\User; 
use App\Models\Mahasiswa; 
use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\Hash; 
 
class DatabaseSeeder extends Seeder 
{ 
    public function run(): void 
    { 
        /* 
        |-------------------------------------------------------------------------- 
        | ADMIN 
        |-------------------------------------------------------------------------- 
        */ 
 
        User::create([ 
            'name' => 'Administrator', 
            'email' => 'admin@example.com', 
            'password' => Hash::make('password123'), 
        ]); 
 
 
        /* 
        |-------------------------------------------------------------------------- 
        | PROGRAM STUDI 
        |-------------------------------------------------------------------------- 
        */ 
 
        $this->call([ 
            ProdiSeeder::class, 
        ]); 
 
 
        /* 
        |-------------------------------------------------------------------------- 
        | MAHASISWA 
        |-------------------------------------------------------------------------- 
        */ 
 
        Mahasiswa::factory() 
            ->count(50) 
            ->create(); 
    } 
} 