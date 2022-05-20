<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banding extends Model
{
    use HasFactory;
    public $table = 'bandings';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
