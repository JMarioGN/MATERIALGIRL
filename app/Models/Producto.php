<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $fillable = ['nombre', 'stock', 'precio', 'descripcion', 'cproducto_id', 'activo', 'venta'];

    public function getcProducto()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\cProducto','cproducto_id','id');
    }

}