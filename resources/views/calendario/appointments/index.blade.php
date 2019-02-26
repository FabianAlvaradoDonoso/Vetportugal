@extends('calendario.layout')

@section('content')

    <h2>Inicio</h2>
    <hr>
    <div class="row">
        <div class="col-md-12 card-group">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white text-center">
                        <button id="graph1" class="btn btn-info btn-block"
                        data-toggle="collapse" data-target="#collapse1" role="button"
                        aria-expanded="false" aria-controls="collapse1">
                    </button>
                    </div>
                    <div class="card-body collapse show text-center" id="collapse1">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>4</h2>
                                <footer>Lunes</footer>
                            </div>
                            <div class="col-md-4">
                                <h2>7</h2>
                                <footer>Martes</footer>
                            </div>
                            <div class="col-md-4">
                                <h2>2</h2>
                                <footer>Miércoles</footer>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <h2>3</h2>
                                <footer>Jueves</footer>
                            </div>
                            <div class="col-md-4">
                                <h2>8</h2>
                                <footer>Viernes</footer>
                            </div>
                            <div class="col-md-4">
                                <h2>4</h2>
                                <footer>Sábado</footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {{--Configuracion Calendar--}}
    <script>

        var sidebaricon = true;

        $("#menu-toggle").html('<i class="fas fa-angle-double-right"></i>');

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            if(sidebaricon) {
                $("#menu-toggle").html('<i class="fas fa-angle-double-left"></i>');
                sidebaricon = false;
            }
            else {
                $("#menu-toggle").html('<i class="fas fa-angle-double-right"></i>');
                sidebaricon = true;
            }
        });

        $('body').css('display', 'block'); //Permite que la página cuando sea cargada no se 'mueva'
    </script>
@endsection
