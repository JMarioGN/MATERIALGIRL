<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_compra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compra';
    protected $fillable = ['no_pedido', 'costo_pieza', 'color', 'fecha_compra', 'marca', 'modelo', 'cantidad', 'id_producto', 'id_talla'];
}
