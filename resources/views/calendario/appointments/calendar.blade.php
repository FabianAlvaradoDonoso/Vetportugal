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
        <div id="calendar"></div>
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
    setTimeout(() => {
        fullcalendar();
    }, 100);
</script>
<script src="{!! asset('calendario/js/eventosFullCalendar.js') !!}"></script>
<script src="{!! asset('calendario/js/esperarPagina.js') !!}"></script>

@endsection
