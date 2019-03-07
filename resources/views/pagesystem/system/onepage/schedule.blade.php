@extends('pagesystem.system.layouts.master');
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Paso 1: Seleccione una especialidad
                    </div>
                    <div class="panel-body">
                        <div class="row clearfix">
                            <div class="col-xs-12 fade-up">
                                {{-- <form action=""> --}}
                                    <div class="form-group p-t-0 p-b-0" style="border-bottom: none">
                                    <label for="selectEsp">Seleccione entre las especialidades</label>
                                        <div class="col-sm-12 ui-select-container ui-select-bootstrap dropdown">
                                            {{-- {{ Form::open() }} --}}
                                            <div class="form-group">
                                                <!--<label for="">Your specialties</label>-->
                                                <select class="form-control" name="selectEsp" id="selectEsp">
                                                    <option value="0" disabled selected>- Especialidad -</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Seleccione un veterinario</label>
                                                <select class="form-control" name="selectVet" id="selectVet">
                                                    <option value="0" disabled selected>- Veterinario -</option>
                                                </select>
                                            </div>
                                            {{-- <button id="siguiente" type="button" class="btn btn-primary btn-lg btn-block text-uppercase m-t-20">Siguiente</button> --}}
                                            {{-- {{ Form::close() }} --}}
                                        </div>
                                    </div>
                                {{-- </form>														 --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">
                <div id="paso2" name="paso2" class="panel panel-default">
                    <div class="panel-heading">
                        Paso 2: Seleccione una fecha
                    </div>
                    <div class="panel-body">
                        <div class="fade-down">
                            <div class="fade-up">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <select class="form-control" name="fechasFiltradas" id="fechasFiltradas">
                                            <option value="0" disabled selected>- Elegir una Fecha -</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="paso3" name="paso3" class="panel panel-default">
                    <div class="panel-heading">
                        Paso 3: Seleccione una hora
                    </div>
                    <div class="panel-body">
                        <div class="fade-down">
                            <div class="fade-up">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <select class="form-control" name="selectHoras" id="selectHoras">
                                            <option value="0" disabled selected>- Elegir una hora -</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div id="paso4" name="paso4" class="panel panel-default">
                    <div class="panel-heading">
                        Paso 4: Ingrese sus datos
                    </div>
                    <div class="panel-body">
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                {{-- <form action=""> --}}
                                    {{ csrf_field() }} {{-- TOKEN! --}}
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input id="nameUser" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Número de celular</label>
                                        <input id="phoneUser" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input id="emailUser" type="text" class="form-control">
                                    </div>
                                    <div id="divButton">

                                    </div>
                                    {{-- <button id="reservar" class="btn btn-primary btn-lg btn-block text-uppercase m-t-20">
                                        <i class="fa fa-calendar-plus-o fa-fw m-r-5"></i> Reservar Hora
                                    </button> --}}
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <button id="" class="btn btn-primary btn-lg btn-block text-uppercase m-t-20"><i class="fa fa-calendar-plus-o fa-fw m-r-5"></i> Reservar Hora</button>
        </div> --}}
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{--Popper--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
{{--BootstrapJS--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
{{--MomentJS--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>

<script src="{{asset('vetportugal/js/reserva.js')}}"></script>

<style>
    .tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }
    .fechasBtn{
        margin-left: 8px;
        width: 90px;
    }
</style>

@endsection
