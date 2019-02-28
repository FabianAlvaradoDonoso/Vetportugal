@extends('calendario.layout')
@section('content')

<div class="title">
    <h2>Gestion de Horas</h2>
</div>
<hr>
<div class="row">
    <div class="col-md-2 text-center" id="calendarAside">
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
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Aplicar solo para el día seleccionado
            </label>
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
                Aplicar para toda la semana
            </label>
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
            <label class="form-check-label" for="exampleRadios3">
                Aplicar para todo el mes
            </label>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-9" id="calendar"></div>
</div>
<br>


@endsection

@section('scripts')
<script src="{!! asset('calendario/js/navbar.js') !!}"></script>
<script src="{!! asset('calendario/js/horasFullCalendar.js') !!}"></script>
<script src="{!! asset('calendario/js/gestionHoras.js') !!}"></script>
<script src="{!! asset('calendario/js/esperarPagina.js') !!}"></script>

@endsection
