@extends('layouts.app')
@section('idsection', "")
@section('content')
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="login-form">
            <h2>Ingreso</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input id="email" type="email"
                        class="@error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                <input id="password" type="password"
                        class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
                <span>
                    <input type="checkbox" class="checkbox" name="remember"
                    id="remember" {{ old('remember') ? 'checked' : '' }}> 
                    Keep me signed in
                </span>

                <button type="submit" class="btn btn-default">{{ __('Login') }}</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div><!--/login form-->
    </div>
</div>
@endsection