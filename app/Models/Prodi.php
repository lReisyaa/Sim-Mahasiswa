<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Prodi extends Model 
{ 
    use HasFactory; 
 
 
    /* 
    |-------------------------------------------------------------------------- 
    | TABLE 
    |-------------------------------------------------------------------------- 
    */ 
 
    protected $table = 'prodis'; 
 
 
    /* 
    |-------------------------------------------------------------------------- 
    | MASS ASSIGNMENT 
    |-------------------------------------------------------------------------- 
    */ 
 
    protected $fillable = [ 
        'kode_prodi', 
        'nama_prodi', 
        'fakultas', 
    ]; 
 
 
    /* 
    |-------------------------------------------------------------------------- 
    | RELASI MAHASISWA 
    |-------------------------------------------------------------------------- 
    */ 
 
    public function mahasiswas() 
    { 
        return $this->hasMany( 
            Mahasiswa::class, 
            'prodi_id' 
        ); 
    } 
}