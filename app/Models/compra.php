<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    use HasFactory;
    protected $table = 'compra';
    protected $fillable = ['total', 'id_detalle_compra', 'id_proveedor', 'id_usuario'];
}
