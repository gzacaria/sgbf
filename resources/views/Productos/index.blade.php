@extends('layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Productos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('productos.create') }}" class="btn btn-info" >Añadir Producto</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Descripción</th>
               <th>Precio Unitario</th>
               <th>Nro. de Lote</th>
               <th>Fecha de Vencimiento</th>
               <th>Observaciones</th>
               <th>Tipo</th>
               <th>Ubicación</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($productos->count())  
              @foreach($productos as $producto)
              @foreach($tipos as $tipo)
              @foreach($ubicaciones as $ubicacion)  
              <tr>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio_unitario}}</td>
                <td>{{$producto->numero_lote}}</td>
                <td>{{$producto->fecha_vencimiento}}</td>
                <td>{{$producto->observaciones}}</td>
                <td>{{$tipo->descripcion}}</td>
                <td>Estante {{$ubicacion->estante}} Fila {{$ubicacion->fila}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ProductosController@edit', $producto->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ProductosController@destroy', $producto->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @endforeach
               @endforeach 
               @else
               <tr>
                <td colspan="8">No se han encontrado registros.</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $productos->links() }}
    </div>
  </div>
</section>

@endsection