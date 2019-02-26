@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">
        @if ($message = Session::get('errores'))
            <div class="alert alert-error alert-dismissible" id="success-alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><i class="icon fa fa-check"></i>
                {{ $message }}</p>
            </div>
        @endif
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
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('control.store')}}" novalidate="novalidate">
                                @csrf
                                <div class="form-group" >
                                    <label for="cliente" class="control-label col-lg-2">Nombre Cliente</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="cliente" name="cliente" class="form-control" value="{{$pet->client->user->name}}" readonly>
                                        @if ($errors->has('cliente'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('nombre')}}</label>
                                        @endif
                                    </div>
                                    <label for="mascota" class="control-label col-lg-2">Nombre Mascota</label>
                                    <div class="col-lg-4">
                                        <input type="text" id="mascota" name="mascota" class="form-control" value="{{$pet->name}}" readonly>
                                        <input type="hidden" name="mascotaID" id="mascotaID" value="{{$pet->id}}">
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
                                        <input type="text" id="veterinario" name="veterinario" class="form-control" value="{{auth()->user()->name}}" readonly>
                                        <input type="hidden" name="veterinarioID" id="veterinarioID" value="{{auth()->user()->id}}">
                                        {{-- <select name="veterinario" id="veterinario" class="form-control">
                                            <option value="" selected disabled>Seleccione Veterinario...</option>
                                            @foreach ($vets as $vet)
                                                @if (Request::old('veterinario') == $vet->id)
                                                    <option value="{{$vet->id}}" selected>{{$vet->user->name}}</option>
                                                @else
                                                    <option value="{{$vet->id}}">{{$vet->user->name}}</option>
                                                @endif
                                            @endforeach
                                        </select> --}}
                                        @if ($errors->has('veterinario'))
                                            <label for="veterinario" class="control-label col-lg-6 text-left text-danger">{{$errors->first('veterinario')}}</label>
                                        @endif
                                    </div>
                                    <label for="fecha" class="control-label col-lg-2">Fecha</label>
                                    <div class="col-lg-4">
                                        <input autocomplete="off" class=" form-control" id="datepicker" name="fecha" type="text" value="{{date('d-m-Y')}}" />
                                        @if ($errors->has('fecha'))
                                            <label for="fecha" class="control-label col-lg-6 text-left text-danger">{{$errors->first('fecha')}}</label>
                                        @endif
                                    </div>
                                    <input type="hidden" name="type" id="type" value="2">

                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ route('pet.show', $pet->id) }}"class="btn btn-danger pull-rigth">Cancelar</a>
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

    </script>
@endsection
