<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{
    use HasFactory;

    protected $table = 'detalle_venta';

    protected $fillable = ['nombre', 'ap', 'am', 'sexo', 'fecha_compra','direccion','telefono', 'id_usuario', 'id_producto'];
}
