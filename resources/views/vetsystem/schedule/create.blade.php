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
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('schedule.store')}}" novalidate="novalidate">
                                @csrf
                                <div class="form-group" >
                                    <label for="cliente" class="control-label col-lg-2">Nombre Cliente<span class="required">*</span></label>
                                    <div class="col-lg-10">
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

                                </div>
                                <div class="form-group" >
                                    <label for="mascota" class="control-label col-lg-2">Nombre Mascota<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="hidden" name="oldValue" id="oldValue" value={{Request::old('mascota')}}>
                                        <select class="form-control" name="mascota" id="mascota">
                                            <option value="" selected disabled>Mascota...</option>
                                        </select>
                                        @if ($errors->has('mascota'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('mascota')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <div class="col-lg-6">
                                            <label for="dia" class="control-label col-lg-2">Día <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input placeholder="Fecha Cita" autocomplete="off" class="form-control" id="datepicker" name="dia" type="text" value="{{Request::old('dia')}}"/>
                                                @if ($errors->has('dia'))
                                                    <label for="dia" class="control-label text-left text-danger">{{$errors->first('dia')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="hora" class="control-label col-lg-2">Hora <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control timepicker" id="hora" name="hora" type="time" value="{{Request::old('hora')}}"/>
                                                @if ($errors->has('hora'))
                                                    <label for="hora" class="control-label text-left text-danger">{{$errors->first('hora')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="vacuna" class="control-label col-lg-2">Vacuna<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="vacuna" id="vacuna" value="{{Request::old('vacuna')}}">
                                            <option value="" selected disabled>Seleccione Vacuna...</option>
                                            @foreach ($vaccines as $vaccine)
                                            @if (Request::old('vacuna') == $vaccine->id)
                                                <option value="{{$vaccine->id}}" selected>{{$vaccine->name}}</option>
                                            @else
                                                <option value="{{$vaccine->id}}">{{$vaccine->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('vacuna'))
                                            <label for="vacuna" class="control-label text-left text-danger">{{$errors->first('vacuna')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ route('schedule.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
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
