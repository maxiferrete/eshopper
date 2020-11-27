@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="signup-form">
            <h2>Registracion</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                    required autocomplete="name" autofocus placeholder="Nombre">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <input id="email" type="email"
                        class="@error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electronico">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                <input id="password" type="password"
                        class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password" placeholder="Contraseña">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                        required autocomplete="new-password" placeholder="Repetir Contraseña">
                
                <button type="submit" class="btn btn-primary">
                    {{ __('Registrarse') }}
                </button>
            </form>
        </div><!--/login form-->
    </div>
</div>
@endsection