@extends('calendario.layout')

@section('content')
    <h2 style="margin: 0; display: inline-block">Información Atención Médica</h2>
    <hr>

    <div class="row text-center">
        {{-- <div class="col-md-4"></div> --}}
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title"><span class="font-weight-bold">Solicitante:</span> {{$appointment->name}}</h5>
                    <p class="card-text"><span class="font-weight-bold">Fecha y Hora:</span> {{date_create($appointment->time)->format('d-m-Y H:i')}}</p>
                    <p class="card-text"><span class="font-weight-bold">Profesional:</span> {{$veterinary->name}}</p>
                    <a class="btn btn-sm btn-success" href="#" role="button">Ver más</a>
                    <a class="btn btn-sm btn-danger" href="{{ URL::previous() }}" role="button">Volver</a>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4"></div> --}}
    </div>
@endsection

@section('scripts')
    <script>
        var icon = true;
        $("#menu-toggle").html('<i class="fas fa-angle-double-right"></i>');

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            if(icon) {
                $("#menu-toggle").html('<i class="fas fa-angle-double-left"></i>');
                icon = false;
            }
            else {
                $("#menu-toggle").html('<i class="fas fa-angle-double-right"></i>');
                icon = true;
            }
        });
    </script>
@endsection
