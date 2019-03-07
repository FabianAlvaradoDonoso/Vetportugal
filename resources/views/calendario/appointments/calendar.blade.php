@extends('calendario.layout')
@section('content')
{{-- {{ dd($appointments) }} --}}
<div class="title">
    <h2 style="margin: 0; display: inline-block">Calendario</h2>
</div>
<hr>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div id="calendar" class="animated fadeIn"></div>
        <div class="text-center">
            <div id="spinner" class="spinner-border" role="status" style="width: 3rem; height: 3rem; position: fixed; top: 50%;left: 50%;"></div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<br>


@endsection

@include('calendario.appointments.modal')

@section('scripts')
<script src="{!! asset('calendario/js/navbar.js') !!}"></script>
<script>
    var eventos = {!! json_encode($appointments) !!};
    $("#calendar").hide();
    setTimeout(() => {
        $("#spinner").hide();
        $("#calendar").show();
        fullcalendar();
    }, 3000);
</script>
<script src="{!! asset('calendario/js/eventosFullCalendar.js') !!}"></script>
<script src="{!! asset('calendario/js/infoModal.js') !!}"></script>
<script src="{!! asset('calendario/js/esperarPagina.js') !!}"></script>

@endsection
