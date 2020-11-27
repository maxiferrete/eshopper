@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Gestión de <b>@yield('tituloGestion', 'AGREGAR TITULO GESTIÓN')</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="@yield('rutaCrear')" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>@yield('botonAgregar', 'Falta titulo boton add')</span></a>
                </div>
            </div>
        </div>
        @yield('listado')
    </div>
</div>        
@endsection