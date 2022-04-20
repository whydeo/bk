<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\mapel;
use App\models\kelas;
class guru extends Model
{
    use HasFactory;
    public $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $guarded = [];
    public function mapel()
    {
        return $this->belongsTo(mapel::class,'id_mapel');
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class,'id_kelas');
    }
}
