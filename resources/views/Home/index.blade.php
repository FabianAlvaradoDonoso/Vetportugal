<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sistemas | VetPortugal</title>
    <link rel="stylesheet" href="{{asset('home/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('home/assets/css/styles.css')}}">
    <link href="{{asset('veticon.ico')}}" rel="icon">
</head>

<body>
    <div id="divMayor">
        <div data-bs-parallax-bg="true" id="arriba" style="background-image: url(home/assets/img/arriba2.png);filter: blur(0px);background-color: rgba(61,3,3,0.56);">
            <a class="d-flex justify-content-center align-items-center" href="/clinica" data-bs-hover-animate="pulse" id="link" style="display: block;height: 100%;font-size: 40px;font-family: Montserrat, sans-serif;font-weight: bold;">
                <span style="color: rgb(255,255,255);">Perfiles Clinicos</span>
            </a>
        </div>
        <div data-bs-parallax-bg="true" id="izq" style="background-image: url(home/assets/img/izq2.png);background-color: rgb(140,119,6);">
            <a class="text-center d-flex justify-content-center align-items-center" href="/appointments" data-bs-hover-animate="pulse" id="link" style="display: block;height: 100%;">
                <span>Reserva de Hora</span>
            </a>
        </div>
        <div data-bs-parallax-bg="true" id="der" style="background-image: url(home/assets/img/der2.png);background-color: rgb(86,16,7);">
            <a class="text-center d-flex justify-content-center align-items-center" href="/dash" data-bs-hover-animate="pulse" id="link" style="display: block;height: 100%;">
                <span>Auto-Administrador</span>
            </a>
        </div>
        <div id="divButton">
            <a  id="logout" class="btn btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="icon_key_alt"></i> {{__("Salir")}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <script src="{{asset('home/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('home/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/assets/js/bs-animation.js')}}"></script>
</body>

</html>
