@extends('layouts.app')

@section('content')
@if (session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	@if (session('update'))
		<div class="alert alert-info alert-dismissible fade show" role="alert">
			{{ session('update') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	@if (session('eliminado'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{ session('eliminado') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row justify-content-between">
                <div class="col-sm-6">
                    <h2><b>@yield('tituloGestion', 'AGREGAR TITULO GESTIÓN')</b></h2>
                </div>
                <div class="col-sm-2 offset-md-4 align-self-end">
                    <a href="@yield('rutaCrear')" class="btn btn-success"><i class="fa fa-plus-circle"></i> <span>@yield('botonAgregar', 'Falta titulo boton add')</span></a>
                </div>
            </div>
        </div>
        @yield('listado')
    </div>
</div>        
@endsection