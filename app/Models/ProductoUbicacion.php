<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoUbicacion extends Model
{
    protected $table="productos_ubicacion";
    public function producto()
    {
    	return $this->belongsTo("App\Models\Producto");
    }
}
