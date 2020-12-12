@extends('layouts.list')
@section('tituloPagina', 'Products List')
@section('tituloGestion', 'Products')
@section('botonAgregar', "New Product")
@section('rutaCrear'){{ route('products.create') }}@endsection
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
                    <a href="{{route('products.show',['product'=>$product->id] )}}" class="show" ><i class="fa fa-eye text-success" title="Show Product"></i></a>
                    <a href="{{route('products.edit',['product'=>$product->id] )}}" class="edit" ><i class="fa fa-edit text-primary" title="Edit Product"></i></a>
                    <a href="{{route('products.show',['product'=>$product->id])}}" class="delete" ><i class="fa fa-minus-circle text-danger" title="Delete Product"></i></a>
                </td>
            </tr>    
        @empty
            <tr>
                <td colspan="8">
                <div>
                    Aún no hay products cargados
                </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@if ($products->count())
    {!! $products->links() !!}
@endif
@endsection