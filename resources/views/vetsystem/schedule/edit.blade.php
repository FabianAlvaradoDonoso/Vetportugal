@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-syringe"></i> Citas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-syringe"></i><a href="{{route('schedule.index')}}">Citas</a></li>
                <li><i class="fa fa-pen"></i>Editar</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Edición de Cita
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{ route('schedule.update',$res->id) }}" novalidate="novalidate">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="hidden" name="id" id="id" value="{{$res->vaccine_id}}">
                                <div class="form-group ">
                                    <label for="cliente" class="control-label col-lg-2">Cliente</label>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <option value="" selected disabled>Seleccione Cliente...</option>
                                            @foreach ($users as $user)
                                                    @if ($user->id == $client->id)
                                                        <option value="{{$user->id}}" selected>{{$user->name}} {{$user->last_name}}</option>
                                                    @else
                                                        <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('cliente'))
                                            <label for="cliente" class="control-label col-lg-3 text-left text-danger">{{$errors->first('cliente')}}</label>
                                        @endif
                                    </div>
                                    <label for="mascota" class="control-label col-lg-2">Mascota</label>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="mascota" id="mascota">
                                            <option value="" selected disabled>Mascota...</option>
                                            @foreach ($petsalls as $petsall)
                                                @if ($petsall->client_id == $client->id)
                                                    @if ($petsall->id == $pet->id)
                                                        <option value="{{$petsall->id}}" selected>{{$petsall->name}}</option>
                                                    @else
                                                        <option value="{{$petsall->id}}">{{$petsall->name}}</option>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </select>
                                        @if ($errors->has('mascota'))
                                            <label for="mascota" class="control-label col-lg-3 text-left text-danger">{{$errors->first('mascota')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="vacuna" class="control-label col-lg-2">Vacuna</label>
                                    <div class="col-lg-10">
                                        <select name="vacuna" id="vacuna" class="form-control">
                                            @foreach ($vaccines as $vaccine)
                                                @if ($res->vaccine_id == $vaccine->id)
                                                    <option value="{{$vaccine->id}}" selected>{{$vaccine->name}}</option>
                                                @else
                                                    <option value="{{$vaccine->id}}">{{$vaccine->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('vacuna'))
                                            <label for="vacuna" class="control-label col-lg-3 text-left text-danger">{{$errors->first('vacuna')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="dia" class="control-label col-lg-2">Día</label>
                                    <div class="col-lg-3">
                                        <input autocomplete="off" class=" form-control" id="datepicker" name="dia" type="text" value="{{date('d-m-Y', strtotime($res->scheduled_date))}}" />
                                        @if ($errors->has('dia'))
                                            <label for="dia" class="control-label col-lg-6 text-left text-danger">{{$errors->first('dia')}}</label>
                                        @endif
                                    </div>
                                    <label for="hora" class="control-label col-lg-2">Hora</label>
                                    <div class="col-lg-3">
                                        <input class=" form-control" id="hora" name="hora" type="time" value="{{\Carbon\Carbon::createFromFormat('H:i:s',$res->scheduled_time)->format('H:i')}}" />
                                        @if ($errors->has('hora'))
                                            <label for="hora" class="control-label col-lg-6 text-left text-danger">{{$errors->first('hora')}}</label>
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
            startDate: '0d',
        })

        // //Timepicker
        // $('.timepicker').timepicker({
        //     showInputs: false,
        //     timeFormat: 'H:i:s'
        // })

    </script>
@endsection
