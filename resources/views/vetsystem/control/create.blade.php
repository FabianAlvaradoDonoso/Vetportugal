@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-syringe"></i> Cita</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-syringe"></i><a href="{{route('schedule.index')}}">Cita</a></li>
                <li><i class="fa fa-plus"></i>Nuevo</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Nueva Cita Vacuna
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " id="myForm" role="form" method="POST" action="{{route('control.store')}}" novalidate="novalidate">
                                @csrf
                                <div class="form-group" >
                                    <label for="cliente" class="control-label col-lg-2">Nombre Cliente</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <option value="" selected disabled>Seleccione Cliente...</option>
                                            @foreach ($users as $user)
                                                @if ($user->role_id == 3)
                                                    @if (Request::old('cliente') == $user->id)
                                                        <option value="{{$user->id}}" selected>{{$user->name}} {{$user->last_name}}</option>
                                                    @else
                                                        <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('cliente'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('nombre')}}</label>
                                        @endif
                                    </div>
                                    <label for="mascota" class="control-label col-lg-2">Nombre Mascota</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" name="oldValue" id="oldValue" value={{Request::old('mascota')}}>
                                        <select class="form-control" name="mascota" id="mascota">
                                            <option value="" selected disabled>Mascota...</option>
                                        </select>
                                        @if ($errors->has('mascota'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('mascota')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sintoma" class="control-label col-lg-2">Sintoma</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="sintoma" name="sintoma" class="form-control" value="{{Request::old('sintoma')}}">
                                        @if ($errors->has('sintoma'))
                                            <label for="sintoma" class="control-label col-lg-6 text-left text-danger">{{$errors->first('sintoma')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sintoma" class="control-label col-lg-2">Conducta</label>
                                    <div class="col-lg-4">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-info">
                                                <input type="radio" name="conducta" id="conducta" value="Alerta"> Alerta
                                            </label>
                                            <label class="btn btn-info">
                                                <input type="radio" name="conducta" id="conducta" value="Deprimido"> Deprimido
                                            </label>
                                            <label class="btn btn-info">
                                                <input type="radio" name="conducta" id="conducta" value="Inconciente"> Inconciente
                                            </label>
                                            <label class="btn btn-info">
                                                <input type="radio" name="conducta" id="conducta" value="Otro"> Otro
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="conductaOtro" id="conductaOtro" disabled >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="peso" class="control-label col-lg-1">Peso</label>
                                    <div class="col-lg-1">
                                        <input type="number" name="peso" id="peso" class="form-control">
                                    </div>

                                    <label for="peso" class="control-label col-lg-1">Desidratación</label>
                                    <div class="col-lg-2">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-info">
                                                <input type="radio" name="desidratacion" id="desidratacion" value="No"> No
                                            </label>
                                            <label class="btn btn-info">
                                                <input type="radio" name="desidratacion" id="desidratacion" value="Si"> Si
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <input placeholder="%" class="form-control" type="number" name="desidratacionSi" id="desidratacionSi" disabled >
                                    </div>

                                    <label for="cc" class="control-label col-lg-1">CC</label>
                                    <div class="col-lg-1">
                                        <input placeholder="/5" type="number" name="cc" id="cc" class="form-control">
                                    </div>

                                    <label for="tc" class="control-label col-lg-1">T°C</label>
                                    <div class="col-lg-1">
                                        <input placeholder="°" type="number" name="tc" id="tc" class="form-control">
                                    </div>

                                    <label for="fc" class="control-label col-lg-1">Fc</label>
                                    <div class="col-lg-1">
                                        <input placeholder="/min" type="number" name="fc" id="fc" class="form-control">
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label for="diagnostico" class="control-label col-lg-2">Diagnostico</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="diagnostico" name="diagnostico" class="form-control" value="{{Request::old('diagnostico')}}">
                                        @if ($errors->has('diagnostico'))
                                            <label for="diagnostico" class="control-label col-lg-6 text-left text-danger">{{$errors->first('diagnostico')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="descripcion" class="control-label col-lg-2">Descripción</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{Request::old('descripcion')}}">
                                        @if ($errors->has('descripcion'))
                                            <label for="descripcion" class="control-label col-lg-6 text-left text-danger">{{$errors->first('descripcion')}}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="veterinario" class="control-label col-lg-2">Veterinario</label>
                                    <div class="col-lg-4">
                                        <select name="veterinario" id="veterinario" class="form-control">
                                            <option value="" selected disabled>Seleccione Veterinario...</option>
                                            @foreach ($vets as $vet)
                                                @if (Request::old('veterinario') == $vet->id)
                                                    <option value="{{$vet->id}}" selected>{{$vet->user->name}}</option>
                                                @else
                                                    <option value="{{$vet->id}}">{{$vet->user->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('veterinario'))
                                            <label for="veterinario" class="control-label col-lg-6 text-left text-danger">{{$errors->first('veterinario')}}</label>
                                        @endif
                                    </div>
                                    <label for="fecha" class="control-label col-lg-2">Fecha</label>
                                    <div class="col-lg-4">
                                        <input autocomplete="off" class=" form-control" id="datepicker" name="fecha" type="text" value="{{Request::old('fecha')}}" />
                                        @if ($errors->has('fecha'))
                                            <label for="fecha" class="control-label col-lg-6 text-left text-danger">{{$errors->first('fecha')}}</label>
                                        @endif
                                    </div>
                                    <input type="hidden" name="type" id="type" value="1">

                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ route('control.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
    <script src="{{asset("js/SelectPet.js")}}"></script>
    <script src={{asset("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}></script>
    {{-- <script src={{asset("plugins/timepicker/bootstrap-timepicker.js")}}></script> --}}
    {{-- <script type="text/javascript" src={{asset("js/jquery.timepicker.js")}}></script> --}}
    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            todayHighlight: true,
            todayBtn: 'linked',
            weekStart: 1,
            startDate: '0d',
        })

        // //Timepicker
        // $('.timepicker').timepicker({
        //     showInputs: false,
        //     timeFormat: 'H:i:s'
        // })

        $('#myForm input').on('change', function() {
            if($('input[name=conducta]:checked', '#myForm').val() == 'Otro'){
                $('#conductaOtro').prop('disabled', false)
                $('#conductaOtro').focus()
            }else{
                $('#conductaOtro').prop('disabled', true)
            }
        });
        $('#myForm input').on('change', function() {
            if($('input[name=desidratacion]:checked', '#myForm').val() == 'Si'){
                $('#desidratacionSi').prop('disabled', false)
                $('#desidratacionSi').focus()
            }else{
                $('#desidratacionSi').prop('disabled', true)
            }
        });


    </script>
@endsection
