<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use app\models\guru;

class mapel extends Model
{
    use HasFactory;
    protected $table ='nilaiawals';
    protected $primary='id_nawal';
    protected $guard=[''];
}
