<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoTipo extends Model
{
    protected $table="productos_tipos";
    public function producto()
    {
    	return $this->belongsTo("App\Models\Producto");
    }
}
