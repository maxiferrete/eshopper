@extends('layouts.list')
@section('tituloPagina', 'Listado de Products')
@section('tituloGestion', 'Products')
@section('botonAgregar', "Crear Product")
@section('rutaCrear')
    {{ route('products.create') }}
@endsection
@section('listado')
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Condicion</th>
            <th>Categoria</th>
            <th>Subcategori</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <!--iterar los products del listado-->
        @forelse ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->web_id}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->brand['name']}}</td>
                <td>{{$product->condition['name']}}</td>
                <td>{{$product->category['name']}}</td>
                <td>@isset($product->subcategory){{$product->subcategory['name']}}@endif</td>
                <td>
                    <a href="{{route('products.edit',['product'=>$product->id] )}}" class="edit" ><i class="material-icons"  title="Edit">&#xE254;</i></a>
                    <a href="{{route('products.show',['product'=>$product->id])}}" class="delete" ><i class="material-icons" title="Delete">&#xE872;</i></a>
                </td>
            </tr>    
        @empty
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Aún no hay products cargados
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforelse
    </tbody>
</table>

@if ($products->count())
    {!! $products->links() !!}
@endif
@endsection