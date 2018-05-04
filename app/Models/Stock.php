<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['cantidad_actual', 'cantidad_minima', 'producto_id'];
    protected $table="stock";
    public function producto()
    {
    	return $this->belongsTo("App\Models\Producto");
    }
}
