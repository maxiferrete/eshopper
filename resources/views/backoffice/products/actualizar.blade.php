@extends('layouts.app')
@section('container')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card mt-3">
			<div class="card-header  text-white bg-primary mb-3">Editar Producto</div>
			<div class="card-body">
				<!--agrgar action -->
				<form method="POST" action=" {{ route('productos.update', ["producto"=>$producto->id])}} ">
					@csrf
					@method("PUT")
					<!--agregar metodo -->
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control" id="nombre" 
						placeholder="Nombre del producto" required="required" maxlenght="100"
						value="{{ $producto->nombre}}" >
					</div>
					<div class="form-group">
						<label for="Descripcion">Descripcion</label>
						<input type="text" name="descripcion" class="form-control" id="descripcion"  
						placeholder="Descripcion del producto" required="required"
						value="{{ $producto->descripcion }}">
					</div>
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="number" name="precio" class="form-control" id="precio"
						placeholder="Precio del producto" required="required"
						value="{{$producto->precio}}">
					</div>
					<button type="submit" class="btn btn-primary">Guardar</button>
		
					<a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection