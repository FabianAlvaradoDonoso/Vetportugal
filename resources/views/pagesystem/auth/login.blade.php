@extends('layouts.app')

@section('content')

    <form class="animated fadeIn slower" method="POST" style="background-color: rgba(30,40,51,0.9);" action="{{ route('login') }}">
        @csrf
        <h2 class="sr-only">Login</h2>
        <div class="illustration">
            <img src={{asset('images/logo.png')}} alt="Logo">
            {{-- <i class="icon ion-ios-locked-outline"></i> --}}
        </div>
        <div class="form-group">
            <input autocomplete="off" placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input autocomplete="off" placeholder="Contraseña" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
        </div>

        <a href="{{ route('register') }}" class="forgot">¿No tienes una cuenta?</a>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forgot">¿Olvidaste tu contraseña?</a>
        @endif

        <a href="{{ url('/') }}" class="forgot">Volver Inicio</a>

    </form>
@endsection
