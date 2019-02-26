@extends('calendario.layout')
@section('content')
{{-- {{ dd($appointments) }} --}}
    <div class="title">
        <h2 style="margin: 0; display: inline-block">Calendario</h2>
        <a name="" style="float: right" class="btn btn-lg btn-primary" href="#" role="button">Agregar Atención</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div id="calendar"></div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br>


    @endsection

    @include('calendario.appointments.modal')

    @section('scripts')
    {{--Configuracion Calendar--}}
    <script>
        $(function() {
            $("#menu-toggle").html('<i class="fas fa-angle-double-right"></i>');

            var icon = true;
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

            var eventos = {!! json_encode($appointments) !!};
            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today'
                },
                events: eventos,
                fixedWeekCount: false,
                eventLimit: 4,
                timeFormat: 'H:mm',
                eventClick: function(eventObj) {

                    console.log(eventObj);
                    var action = "http://eventos.test/appointments/" + eventObj.id;
                    var route = "http://eventos.test/appointments/"+ eventObj.id +"/edit";

                    $.get(route, function(data){
                        // console.log(data);
                        $('#name').val(data.name);
                        $("#phone").val(data.phone);
                        $("#state_id").val(data.state_id);
                        $("#state").css('color', eventObj.color);
                        $("#id").val(data.id);
                        $("#form").attr('action', action);


                        $('#calendarModal').modal();
                    }).fail(function(err) {
                        console.error(err);
                    });
                }
            });

            $('body').css('display', 'block'); //Permite que la página cuando sea cargada no se 'mueva'
        });
        </script>

@endsection
