<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ingreso - VetPortugal</title>
    <link href="{{asset('veticon.ico')}}" rel="icon">
    <link rel="stylesheet" href="{{asset('plantilla-login/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{(asset('plantilla-login/fonts/fontawesome-all.min.css'))}}">
    <link rel="stylesheet" href="{{asset('plantilla-login/css/styles.min.css')}}">
</head>

<body>
<div class="container-fluid">

    @if(session('message'))
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="alert alert-{{ session('message')[0] }}">
                    <h4 class="alert-heading">{{ __("Alerta.") }}</h4>
                    <p>{{ session('message')[1] }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="row mh-100vh">

        <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">

            <div class="m-auto w-lg-75 w-xl-50">
                <h2 class="text-center text-info font-weight-light mb-5" style="color: #008dd5;"><strong>Veterinaria Portugal</strong></h2>
                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="text-secondary">Correo</label>
                        <input class="form-control" name="email"  id="email" type="text" value="{{ old('email') }}" required autofocus pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" inputmode="email">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong style=" color: red;">{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="text-secondary">Contraseña</label>
                        <input class="form-control" type="password" name="password" id="password" required="" placeholder="********" pattern="[A-Za-z0-9!?-]{8,12}">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong  style=" color: red;">{{ $errors->first('password') }}</strong>
                                    </span>

                        @endif

                    </div>

                    <button class="btn btn-info btn-block mt-2" type="submit" style="background-color: #008dd5;">Ingresar</button>



                    {{-- <a class="btn btn-primary btn-block" role="button" href="{{ route('social_auth', ['driver' => 'google']) }}" style="background-color: #f56476;"><i class="fab fa-google"></i>&nbsp;Google</a> --}}
                </form>

                @if (Route::has('password.request'))
                    <p class="mt-3 mb-0" style="color: #008dd5;"><a href="{{ route('password.request') }}" class="text-info small">¿Olvidó su contraseña?</a></p>
                    </a>
                @endif

                <br>

            </div>
        </div>

        <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image: url(&quot;plantilla-login/img/vet-portugal.jpg&quot;);background-size: cover;background-position: center center;"></div>

    </div>
</div>

<script src="plantilla-login/js/jquery.min.js"></script>
<script src="plantilla-login/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
