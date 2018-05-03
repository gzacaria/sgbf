<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['descripcion', 'precio_unitario', 'numero_lote', 'fecha_vencimiento', 'observaciones', 'producto_tipo_id', 'producto_ubicacion_id'];
}
