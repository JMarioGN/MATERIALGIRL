<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class talla extends Model
{
    use HasFactory;
    protected $table = 'talla';
    protected $fillable = ['talla'];
}
