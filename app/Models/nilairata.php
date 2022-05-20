<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilairata extends Model
{
    use HasFactory;
    protected $table ='nilairatas';
    protected $primary='id_nilai';
    protected $guard=[''];
}
