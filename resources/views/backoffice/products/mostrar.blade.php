@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="card mt-3">
			<div class="card-header  text-white bg-primary mb-3">Detalle del Producto</div>
			<div class="card-body">
				<div>
					<img src="{{ asset('storage/'.$product->image)}}" alt="fadlk;" srcset="">
				</div>
                <form method="POST" action="{{route('products.destroy', ['product'=>$product->id])}}">
                    @csrf
                    @method("DELETE")
                    <fieldset disabled="disabled">
						
						<div class="form-group">
							<label for="nombre">Nombre</label>
						<input type="text" name="name" class="form-control" id="nombre" value="{{$product->name}}" >
						</div>
						<div class="form-group">
							<label for="web_id">Codigo</label>
							<input type="text" name="web_id" class="form-control" id="web_id" 
							value="{{$product->web_id}}">
						</div>
						<div class="form-group">
							<label for="price">Precio</label>
							<input type="text" name="price" class="form-control" id="price" value="{{$product->price}}">
						</div>
						<div class="form-group">
							<label for="brand_id">Marca</label>
							<input type="text" name="brand_id" class="form-control" id="brand_id" value="{{$product->brand['name']}}">
						</div>
						<div class="form-group">
							<label for="condition_id">Condicion</label>
							<input type="text" name="condition_id" class="form-control" id="condition_id" value="{{$product->condition['name']}}">
						</div>
						<div class="form-group">
							<label for="precio">Categoria</label>
							<input type="text" name="category_id" class="form-control" id="category_id" value="{{$product->category['name']}}">
						</div>
						<div class="form-group">
							<label for="subcategory_id">Subcategoria</label>
							<input type="text" name="subcategory_id" class="form-control" id="subcategory_id" value="{{$product->subcategory['name']}}">
						</div>
						<div class="form-group">
							<label for="precio">Imagen</label>
							<input type="file" name="image" class="form-control" id="image" value="" 
							placeholder="Imagen del producto">
						</div>
					</fieldset>
					
					<button type="submit" class="btn btn-warning">Eliminar</button>
		
					<a href="{{route('products.index')}}" class="btn btn-danger">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection