@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="card mt-3">
			<div class="card-header  text-white bg-primary mb-3"><h3>Editar Producto</h3></div>
			<div class="card-body">
				<!--agrgar action -->
				<form method="POST" action="{{ route('products.update', ["product"=>$product->id])}}"  enctype="multipart/form-data" >
					@csrf
					@method("PUT")
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="name" class="form-control" id="nombre" value="{{$product->name}}"
						placeholder="Nombre del producto" required="required" maxlenght="100" >
					</div>
					<div class="form-group">
						<label for="web_id">Codigo</label>
						<input type="text" name="web_id" class="form-control" id="web_id" value="{{$product->web_id}}"
						placeholder="Codigo del producto" required="required">
					</div>
					<div class="form-group">
						<label for="price">Precio</label>
						<input type="number" name="price" class="form-control" id="price" value="{{$product->price}}"
						placeholder="Precio del producto" required="required">
					</div>
					<div class="form-group">
						<label for="brand_id">Marca</label>
						<select name="brand_id" class="form-control" id="brand_id" required='required'>
							<option value="">Seleccionar....</option>
							@foreach ($brands as $b)
								<option value="{{$b->id}}" @if ($product->brand['id']==$b->id)
									selected='selected'
								@endif>{{$b->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="condition_id">Condicion</label>
						<select name="condition_id" class="form-control" id="condition_id" required='required'>
							<option value="">Seleccionar....</option>
							@foreach ($conditions as $c)
								<option value="{{$c->id}}" @if ($product->condition['id']==$c->id)
									selected='selected'
								@endif
								>{{$c->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="precio">Categoria</label>
						<select name="category_id" class="form-control" id="category_id" required='required'>
							<option value="">Seleccionar....</option>
							@foreach ($categories as $ca)
								<option value="{{$ca->id}}"  @if ($product->category['id']==$ca->id)
									selected='selected'
								@endif>{{$ca->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="subcategory_id">Subcategoria</label>
						<select name="subcategory_id" class="form-control" id="subcategory_id">
							<option value="">Seleccionar....</option>
							@foreach ($subcategories as $s)
								<option value="{{$s->id}}"  @if ($product->subcategory['id']==$s->id)
									selected='selected'
								@endif>{{$s->subcategory}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="precio">Imagen</label>
						<input type="file" name="image" class="form-control" id="image" value="" 
						placeholder="Cambiar imagen del producto">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<a href="{{route('products.index')}}" class="btn btn-danger">Cancelar</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>


@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$('#category_id').change(function(){
			let category = $(this).children("option:selected").val();
			let url = "{{route('category.subacategories',['categoryID'=>'#IDCAT'])}}";

			url = url.replace('#IDCAT', category);
			$.ajax({
				url:url
			}).done(function(data){
				data = JSON.parse(data);
				let subcategoryDD = $("#subcategory_id");
				subcategoryDD.find("option").remove();
				subcategoryDD.append("<option value=''>Seleccionar....</option>");

				if(data.length>0){
					subcategoryDD.prop('disabled', false);
					
					$(data).each(function (index) {
						subcategoryDD.append("<option value='"+this.id+"'>"+this.subcategory+"</option>");
					})
				}else{
					subcategoryDD.prop('disabled', true);
				}
			}).fail(function(data){
				console.log(data);
			})
		})	
	})	
</script>	
@endsection