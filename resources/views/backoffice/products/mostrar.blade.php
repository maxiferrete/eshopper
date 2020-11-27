@extends('layouts.app')
@section('container')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card mt-3">
			<div class="card-header  text-white bg-primary mb-3">Eliminar Producto</div>
			<div class="card-body">
                <form method="POST" action="{{route('productos.destroy', ['producto'=>$producto->id])}}">
                    @csrf
                    @method("DELETE")
                    <fieldset disabled="disabled">
                    
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" 
						placeholder="Nombre del producto" required="required" maxlenght="100" 
						value="{{ $producto->nombre}}">

					</div>
					<div class="form-group">
						<label for="Descripcion">Descripcion</label>
						<input type="text" name="descripcion" class="form-control" id="descripcion" 
						value="{{$producto->descripcion}}" placeholder="Descripcion del producto" required="required">
					</div>
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="number" name="precio" class="form-control" id="precio" 
						value="{{$producto->precio}}" placeholder="Precio del producto" required="required">
                    </div>
                    </fieldset>
					<button type="submit" class="btn btn-warning">Eliminar</button>
		
					<a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection