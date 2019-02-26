@extends('layouts.app')

@section('content')

    <form class="animated fadeIn slower" method="POST" action="{{ route('register') }}" style="background-color: rgba(30,40,51,0.9);">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-plus-outline"></i></div>

        <div class="form-group">
            <input placeholder="Nombre" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input placeholder="Contraseña" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input placeholder="Repetir Contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Registrarse</button>
        </div>
        <a href="{{ route('login') }}" class="forgot">¿Tienes una cuenta?</a>
        <a href="{{ url('/') }}" class="forgot">Volver Inicio</a>
    </form>
@endsection
