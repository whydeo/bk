<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karakter extends Model
{
    use HasFactory;
    protected $table ='point4bs';
    protected $primary ='id_poin';
    protected $fillable =['id_siswa','Berkualitas','Berbudi','Berdaya','Berhasil'];
}
