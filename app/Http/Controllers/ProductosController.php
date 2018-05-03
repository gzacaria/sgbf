<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\ProductoTipo;
use App\Models\ProductoUbicacion;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Lista de Productos';
        $tipos=ProductoTipo::all();
        $ubicaciones=ProductoUbicacion::all();
        $productos=Producto::orderBy('id', 'DESC')->paginate(3);
        return view('productos.index', compact('productos','title'), ['tipos' => $tipos, 'ubicaciones' => $ubicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Nuevo Producto';
        $tipos=ProductoTipo::all();
        $ubicaciones=ProductoUbicacion::all();
        return view('productos.create', compact('title'), ['tipos' => $tipos, 'ubicaciones' => $ubicaciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'descripcion' => 'required', 
            'precio_unitario' => 'required', 
            'numero_lote' => 'required', 
            'fecha_vencimiento' => 'required', 
            'observaciones' => 'required', 
            'producto_tipo_id' => 'required', 
            'producto_ubicacion_id' => 'required']);
        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success','Producto creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos=Producto::find($id);
        return  view('productos.show',compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='Editar Producto';
        $tipos=ProductoTipo::all();
        $ubicaciones=ProductoUbicacion::all();
        $producto=Producto::find($id);
        return view('productos.edit',compact('producto','title'),['tipos' => $tipos, 'ubicaciones' => $ubicaciones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'descripcion' => 'required', 
            'precio_unitario' => 'required', 
            'numero_lote' => 'required', 
            'fecha_vencimiento' => 'required', 
            'observaciones' => 'required', 
            'producto_tipo_id' => 'required', 
            'producto_ubicacion_id' => 'required']);
        Producto::find($id)->update($request->all());
        return redirect()->route('productos.index')->with('success','Producto actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::find($id)->delete();
        return redirect()->route('productos.index')->with('success','Producto eliminado satisfactoriamente');

    }
}
