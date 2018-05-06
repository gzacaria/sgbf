<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->increments('id');
            $table->string('descripcion');
            $table->decimal('precio_unitario', 5, 2);
            $table->string('numero_lote');
            $table->date('fecha_vencimiento');
            $table->string('observaciones');
            $table->integer('producto_tipo_id')->unsigned();
            $table->foreign('producto_tipo_id')->references('id')->on('productos_tipos');
            $table->integer('producto_ubicacion_id')->unsigned();
            $table->foreign('producto_ubicacion_id')->references('id')->on('productos_ubicacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
