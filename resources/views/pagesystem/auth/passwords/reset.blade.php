@extends('layouts.app')

@section('content')
    <form class="animated fadeIn slower" method="POST" action="{{ route('password.update') }}" style="background-color: rgba(30,40,51,0.9);">
        @csrf
        <h2 class="sr-only">Reset</h2>
        <div class="illustration"><i class="icon ion-ios-color-wand-outline"></i></div>

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
                <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
                <input placeholder="Contraseña" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
                <input placeholder="Repetir Contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary btn-block">Restrablecer Contraseña</button>
                <a href="{{ url('/') }}" class="forgot">Volver Inicio</a>
            </div>
        </div>
    </form>
@endsection
