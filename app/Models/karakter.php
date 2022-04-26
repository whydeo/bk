<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karakter extends Model
{
    use HasFactory;
    protected $table ='poin4bs';
    protected $primary ='id_poin';
    protected $fillable =['id_siswa','id_guru','Berkualitas','Berbudi','Berdaya','Berhasil'];

    public function guru()
    {
        return $this->belongsTo(guru::class,'id_guru');
    }
    public function siswa()
    {
        return $this->belongsTo(siswa::class,'id_siswa');
    }

}
