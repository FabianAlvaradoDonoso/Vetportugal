@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-syringe"></i> Controles</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-syringe"></i><a href="{{route('control.index')}}">Controles</a></li>
                <li><i class="fa fa-pen"></i>Editar</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Edición de Control
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{ route('control.update',$control->id) }}" novalidate="novalidate">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-group" >
                                    <label for="cliente" class="control-label col-lg-2">Nombre Cliente</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <option value="" selected disabled>Seleccione Cliente...</option>
                                            @foreach ($users as $user)
                                                @if ($user->role_id == 3)
                                                    @if ($pets->client->user->id == $user->id)
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
                                        <input type="text" id="sintoma" name="sintoma" class="form-control" value="{{$control->symptom}}">
                                        @if ($errors->has('sintoma'))
                                            <label for="sintoma" class="control-label col-lg-6 text-left text-danger">{{$errors->first('sintoma')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="diagnostico" class="control-label col-lg-2">Diagnostico</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="diagnostico" name="diagnostico" class="form-control" value="{{$control->diagnostic}}">
                                        @if ($errors->has('diagnostico'))
                                            <label for="diagnostico" class="control-label col-lg-6 text-left text-danger">{{$errors->first('diagnostico')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="descripcion" class="control-label col-lg-2">Descripción</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{$control->description}}">
                                        @if ($errors->has('descripcion'))
                                            <label for="descripcion" class="control-label col-lg-6 text-left text-danger">{{$errors->first('descripcion')}}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="veterinario" class="control-label col-lg-2">Veterinario</label>
                                    <div class="col-lg-4">
                                        <select name="veterinario" id="veterinario" class="form-control">
                                            @foreach ($vets as $vet)
                                                @if ($vet->id == $control->vet_id)
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
                                        <input autocomplete="off" class=" form-control" id="datepicker" name="fecha" type="text" value="{{date('d-m-Y', strtotime($control->date))}}" />
                                        @if ($errors->has('fecha'))
                                            <label for="fecha" class="control-label col-lg-6 text-left text-danger">{{$errors->first('fecha')}}</label>
                                        @endif
                                    </div>

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
@endsection
@section('scripts')
    <script src="{{asset("js/SelectPet.js")}}"></script>
    <script src={{asset("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js")}}></script>
    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            todayHighlight: true,
            todayBtn: 'linked',
            weekStart: 1,
        })

        // //Timepicker
        // $('.timepicker').timepicker({
        //     showInputs: false,
        //     timeFormat: 'H:i:s'
        // })

    </script>
@endsection
