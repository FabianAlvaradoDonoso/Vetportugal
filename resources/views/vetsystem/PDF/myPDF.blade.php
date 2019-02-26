{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
<body>

    <div class="d-flex justify-content-center">
        <img src="{{ asset('img/vetlogo.png') }}" alt="" width="120px" height="120px">
        <img src="{{ asset('img/vet.png') }}" alt="" width="300px" height="120px">

    </div>
    <h3>{{$title}}</h3>

    <ul>
        @foreach ($types as $type)
            <li>{{$type->name}}</li>
        @endforeach
    </ul>
    <script src="{{asset('plantilla-plataforma/js/jquery.js')}}"></script>
    <script src="{{asset('plantilla-plataforma/js/bootstrap.min.js')}}"></script>
</body>
</html> --}}

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Untitled</title>
    <link href="{{asset('plantilla-plataforma/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla-plataforma/css/bootstrap-theme.css')}}" rel="stylesheet">
</head>

<body>
    <div class="d-lg-flex justify-content-lg-center align-items-lg-center" style="height: 176px;">
        <img src="{{ asset('img/vetlogo.png') }}" style="width: 120px;height: 80px;margin-right: 11px;" />
        <img src="{{ asset('img/vet.png') }}" style="width: 300px;height: 140px;" />
    </div>
    <label class="d-lg-flex justify-content-lg-center" style="font-size: 14px;">Avda. Portugal 1015. Santiago - Fono +56941825002 / 2 22226819 - contacto@vetportugal.cl - www.vetportugal.cl - facebook/Instagram: vetportugal<br /></label>
    <h5
        class="text-center">AUTORIZACIÓN DE EUTANASIA<br /></h5><label class="text-left d-lg-flex" style="font-size: 14px;margin-left: 30px;">En Santiago, a ________ de _____________ de ___________.<br /></label>
        <div class="table-bordered d-lg-flex align-items-lg-center" style="margin: 0px;margin-right: 0px;margin-left: 0px;height: 231px;padding-right: 0px;padding-left: 0px;">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <td>Yo:</td>
                        <td>RUT:</td>
                    </tr>
                    <tr>
                        <td colspan="2">Domiciliado en:</td>
                    </tr>
                    <tr>
                        <td>Comuna:</td>
                        <td>Teléfono:</td>
                    </tr>
                    <tr>
                        <td>Propietario de:</td>
                        <td>Especie:</td>
                    </tr>
                    <tr>
                        <td>Sexo:</td>
                        <td>Raza:</td>
                    </tr>
                    <tr>
                        <td>Edad:</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>

</html>
