@extends('layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Producto</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('productos.update',$producto->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" value="{{$producto->descripcion}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="precio_unitario" id="precio_unitario" class="form-control input-sm" value="{{$producto->precio_unitario}}" numbersonly>
									</div>
								</div>
							</div>

							<!-- <div class="form-group">
								<textarea name="resumen" class="form-control input-sm" placeholder="Resumen"></textarea>
							</div> -->
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="numero_lote" id="numero_lote" class="form-control input-sm" value="{{$producto->numero_lote}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control input-sm" value="{{$producto->fecha_vencimiento}}">
									</div>
								</div>
							</div>

							<div class="form-group">
								<textarea name="observaciones" class="form-control input-sm">{{$producto->observaciones}}</textarea>
							</div>

							<div class="row">								
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										Tipo: <select name="producto_tipo_id">
											@foreach ($tipos as $tipo)
											<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										Ubicación: <select name="producto_ubicacion_id">
											@foreach ($ubicaciones as $ubicacion)
											<option value="{{$ubicacion->id}}">Estante {{$ubicacion->estante}} Fila {{$ubicacion->fila}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12">
							<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
							<a href="{{ route('productos.index') }}" class="btn btn-info btn-block" >Atrás</a>
						</div>	

					</div>
				</form>
			</div>
		</div>

	</div>
</div>
</section>
@endsection