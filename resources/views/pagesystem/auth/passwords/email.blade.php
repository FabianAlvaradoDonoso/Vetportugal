@extends('layouts.app')

@section('content')

    <form class="animated fadeIn slower" method="POST" action="{{ route('password.email') }}" style="background-color: rgba(30,40,51,0.9);">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-email-outline"></i></div>

        <div class="form-group">
            <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Enviar Contraseña al Correo</button>
        </div>
        <a href="{{ route('login') }}" class="forgot">Iniciar Sesión</a>
        <a href="{{ url('/') }}" class="forgot">Volver Inicio</a>
    </form>
@endsection
