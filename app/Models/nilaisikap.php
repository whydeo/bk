<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilaisikap extends Model
{
    use HasFactory;
    protected $table ='nilai_sikaps';
    protected $primary ='id_nilaisikap';
    protected $fillable =['nama_siswa','nilai','penilai','kategori'];
}
