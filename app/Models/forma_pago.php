<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forma_pago extends Model
{
    use HasFactory;
    protected $table = 'talla';
    protected $fillable = ['tipo', 'no_tarjeta', 'nombre_titular'];
}
