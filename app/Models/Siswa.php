<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswas";
    protected $primary='id';
    protected $fillable = ['id','nama_siswa','nis','kelas','jurusan','kelamin'];
    
       public function nilai()
    {
        return $this->hasMany(nilai::class);
    }
}
