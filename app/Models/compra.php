<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    use HasFactory;
    protected $table = 'compra';
    protected $fillable = ['no_pedido', 'costo_pieza', 'color', 'fecha_compra', 'marca', 'modelo', 'cantidad', 'id_proveedor', 'id_producto', 'id_talla', 'id_detalle_compra'];
    
    public function getUser()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\UserEloquent','id_usuario','id');
    }

    public function getProducto()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\Producto','id_producto','id');
    }
}
