<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\guru;

class mapel extends Model
{
    use HasFactory;
    protected $table ='mapels';
    public function guru()
    {
        return $this->hasMany(guru::class);
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class,'id_kelas');
    }
}
