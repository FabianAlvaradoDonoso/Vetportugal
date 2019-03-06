@extends('calendario.layout')
@section('content')
<link rel="stylesheet" href="{{asset('calendario/css/slider.css')}}">

<div class="title">
    <h2 style="margin: 0; display: inline-block">Gestion de Horas</h2>
    <div style="float: right">
        <label class="switch">
            <input id="slider" type="checkbox">
            <span class="slider"></span>
        </label>
    </div>
    <div class="mr-2" style="float: right">
        <p style="float: right; font-size:20px">Eliminar Horas</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3 text-center" id="calendarAside">
        <div class="form-group">
            <label for="veterinarios">Veterinario</label>
            <select class="form-control" name="veterinarios" id="veterinarios">
                @foreach ($veterinaries as $vet)
                    <option value="{{$vet['id']}}">{{$vet['name']}}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <div class="form-group">
            {{ csrf_field() }}
            <label for="">Ingresar día</label><br>
            <input id="date" type="date">
        </div>
        <div class="form-group">
            <label for="">Ingresar hora de atención</label><br>
            <input id="time" type="time">
            <br><br>
            <input class="btn btn-primary" id="crear" type="button" value="Crear">
        </div>
        <hr>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="horasMultiples" id="exampleRadios1" value="1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Aplicar solo para el día seleccionado
            </label>
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="horasMultiples" id="exampleRadios2" value="2">
            <label class="form-check-label" for="exampleRadios2" id="radios2"></label>
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="horasMultiples" id="exampleRadios3" value="3">
            <label class="form-check-label" for="exampleRadios3" id="radios3"></label>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <div id="calendar" class="animated fadeIn"></div>
        <div class="text-center">
            <div id="spinner" class="spinner-border" role="status" style="width: 3rem; height: 3rem; position: fixed; top: 50%;left: 60%;"></div>
        </div>
    </div>
</div>
<br>


@endsection

@include('calendario.appointments.modal')

@section('scripts')
<script src="{!! asset('calendario/js/navbar.js') !!}"></script>
<script src="{!! asset('calendario/js/horasFullCalendar.js') !!}"></script>
<script src="{!! asset('calendario/js/gestionHoras.js') !!}"></script>
<script src="{!! asset('calendario/js/infoModal.js') !!}"></script>
<script>
    $("#calendar").hide();
    setTimeout(() => {
        $("#spinner").hide();
        $("#calendar").show();
    }, 5000);
</script>
<script src="{!! asset('calendario/js/esperarPagina.js') !!}"></script>

@endsection
