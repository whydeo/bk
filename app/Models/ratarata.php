<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratarata extends Model
{
    use HasFactory;
    public $table = 'rataratas';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
