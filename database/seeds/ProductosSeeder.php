<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('productos_tipos')->insert([
    		'descripcion' => 'Perfumería',
    	]);
    	DB::table('productos_ubicacion')->insert([
    		'estante' => 'A',
    		'fila' => '1',
    	]);
    }
}
