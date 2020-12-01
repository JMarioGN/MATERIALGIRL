<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_compra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compra';
    protected $fillable = ['detalle', 'id_usuario', 'id_proveedor'];

    public function getProducto()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\Producto','id_producto','id');
    }
}
