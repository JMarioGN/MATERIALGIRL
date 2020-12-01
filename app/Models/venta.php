<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;
    protected $table = 'venta';
    protected $fillable = ['total', 'costoE','id_usuario'];

    public function getUser()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\UserEloquent','id_usuario','id');
    }
}
