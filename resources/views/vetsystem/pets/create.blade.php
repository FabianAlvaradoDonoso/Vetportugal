@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-syringe"></i> Mascotas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-syringe"></i><a href="{{route('vaccine.index')}}">Mascotas</a></li>
                <li><i class="fa fa-plus"></i>Nuevo</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Ingreso Nueva Mascota
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('pet.store')}}" novalidate="novalidate">
                                @csrf
                                <div class="form-group ">
                                    <label for="mascota" class="control-label col-lg-2">Nombre Mascota</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" name="mascota" id="mascota" value={{Request::old('mascota')}}>
                                        @if ($errors->has('mascota'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('mascota')}}</label>
                                        @endif
                                    </div>

                                    <label for="cliente" class="control-label col-lg-2">Cliente</label>
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
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('cliente')}}</label>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group ">

                                    <label for="especie" class="control-label col-lg-2">Especie</label>
                                    <div class="col-lg-3">

                                        <select class="form-control" name="especie" id="especie" required>
                                            <option value="" selected disabled>Seleccione especie...</option>
                                            @foreach ($types as $type)
                                                @if (Request::old('especie') == $type->id)
                                                    <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                                @else
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('especie'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('especie')}}</label>
                                        @endif
                                    </div>

                                    <label for="raza" class="control-label col-lg-1">Raza</label>
                                    <div class="col-lg-3">
                                        <input type="hidden" name="oldRaza" id="oldRaza" value={{Request::old('raza')}}>
                                        <select class="form-control" name="raza" id="raza" required>
                                            <option value="" selected disabled>Seleccione raza...</option>
                                        </select>
                                        @if ($errors->has('raza'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('raza')}}</label>
                                        @endif
                                    </div>

                                    <label for="sexo" class="control-label col-lg-1">Sexo</label>
                                    <div class="col-lg-2">
                                        <select class="form-control" name="sexo" id="sexo" required>
                                            <option value="" selected disabled>Seleccione sexo...</option>
                                            <option value="1">Macho</option>
                                            <option value="2">Hembra</option>
                                        </select>
                                        @if ($errors->has('sexo'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('sexo')}}</label>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="nacimiento" class="control-label col-lg-2">Fecha Nacimiento</label>
                                    <div class="col-lg-3">
                                        <input placeholder="Nacimiento" autocomplete="off" class="form-control" id="datepicker" name="nacimiento" type="text" value="{{Request::old('nacimiento')}}"/>
                                        @if ($errors->has('nacimiento'))
                                            <label for="nacimiento" class="control-label text-left text-danger">{{$errors->first('nacimiento')}}</label>
                                        @endif
                                    </div>


                                    <label for="color" class="control-label col-lg-1">Color</label>
                                    <div class="col-lg-2">
                                        <input class="form-control" id="color" name="color" type="text" value="{{Request::old('color')}}"/>
                                        @if ($errors->has('color'))
                                            <label for="color" class="control-label text-left text-danger">{{$errors->first('color')}}</label>
                                        @endif
                                    </div>

                                    <label for="castracion" class="control-label col-lg-1">Castración</label>
                                    <div class="col-lg-3">
                                        <input placeholder="Fecha Castración" autocomplete="off" class="form-control" id="datepicker2" name="castracion" type="text" value="{{Request::old('castracion')}}"/>
                                        @if ($errors->has('castracion'))
                                            <label for="castracion" class="control-label text-left text-danger">{{$errors->first('castracion')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ route('vaccine.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
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
    <script src="{{asset("js/SelectBreed.js")}}"></script>
    <script src={{asset("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}></script>

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
        $('#datepicker2').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            todayHighlight: true,
            todayBtn: 'linked',
            weekStart: 1,
            startDate: '0d',
        })

    </script>
@endsection
