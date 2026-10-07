<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Mahasiswa extends Model 
{ 
    use HasFactory; 
 
 
    /* 
    |-------------------------------------------------------------------------- 
    | TABLE 
    |-------------------------------------------------------------------------- 
    */ 
 
    protected $table = 'mahasiswas'; 
 
 
    /* 
    |-------------------------------------------------------------------------- 
    | MASS ASSIGNMENT 
    |-------------------------------------------------------------------------- 
    */ 
 
    protected $fillable = [ 
        'nim', 
        'nama', 
        'jenis_kelamin', 
        'tanggal_lahir', 
        'alamat', 
        'telepon', 
        'email', 
        'prodi_id', 
    ]; 
 
 
    /* 
    |-------------------------------------------------------------------------- 
    | RELASI PROGRAM STUDI 
    |-------------------------------------------------------------------------- 
    */ 
 
    public function prodi() 
    { 
        return $this->belongsTo( 
            Prodi::class, 
            'prodi_id' 
        ); 
    } 
};