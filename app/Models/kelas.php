<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\guru;
use app\models\mapel;

class kelas extends Model
{
    use HasFactory;
    public $table = 'kelas';
    protected $primaryKey = 'id';
    protected $fillable = ['kelas'];
    public function guru()
    {
        return $this->hasMany(guru::class);
    }
    public function mapel()
    {
        return $this->hasMany(mapel::class);
    }
}
