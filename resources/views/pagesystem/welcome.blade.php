<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
                color: white;
            }

            .links > a {
                color: rgb(255, 255, 255);
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links {
                color: rgb(255, 255, 255);
            }

            .subMenu{
                color: rgb(255, 255, 255);
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .welcome {
                color: rgb(255, 255, 255);
            }

        </style>
    </head>
    <body style="height:100%;background:url('/dist/img/fondo.jpg') no-repeat #475d62;background-size:cover;position:relative;">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links animated fadeIn delay-2s slower">
                    @auth
                        Bienvenido! <strong>{{Auth::User()->name}}</strong>
                        <a style="color: white" href="{{ url('/dash') }}">Dashboard</a>
                    @else
                        <a style="color: white" href="{{ route('login') }}">Ingresar</a>

                        @if (Route::has('register'))
                            <a style="color: white" href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md animated fadeIn  slower">
                    Sistema Auto-Administrable
                </div>

                <div class="subMenu animated fadeIn delay-1s slower">
                    Control de la información de su pagina web
                </div>
            </div>
        </div>
    </body>
</html>
