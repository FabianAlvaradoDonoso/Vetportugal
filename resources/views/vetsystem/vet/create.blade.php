@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-paw"></i> Veterinarios</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-paw"></i><a href="{{route('vet.index')}}">Veterinarios</a></li>
                <li><i class="fa fa-plus"></i>Nuevo</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Ingreso Nueva Veterinario
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('vet.store')}}" novalidate="novalidate">
                                @csrf
                                <div class="form-group ">
                                    <label for="nombre" class="control-label col-lg-2">Nombre <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class=" form-control" id="nombre" name="nombre" type="text" value='{{Request::old('nombre')}}'>
                                        @if ($errors->has('nombre'))
                                            <label for="nombre" class="control-label text-left text-danger">{{$errors->first('nombre')}}</label>
                                        @endif
                                    </div>
                                    <label for="apellido" class="control-label col-lg-2">Apellidos <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class=" form-control" id="apellido" name="apellido" type="text" value='{{Request::old('apellido')}}'>
                                        @if ($errors->has('apellido'))
                                            <label for="apellido" class="control-label text-left text-danger">{{$errors->first('apellido')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class=" form-control" id="email" name="email" type="email" value='{{Request::old('email')}}'>
                                        @if ($errors->has('email'))
                                            <label for="email" class="control-label text-left text-danger">{{$errors->first('email')}}</label>
                                        @endif
                                    </div>
                                    <label for="contraseña" class="control-label col-lg-2">Contraseña <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class=" form-control" id="contraseña" name="contraseña" type="password" value='{{Request::old('contraseña')}}'>
                                        @if ($errors->has('contraseña'))
                                            <label for="contraseña" class="control-label text-left text-danger">{{$errors->first('contraseña')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="telefono" class="control-label col-lg-2">Teléfono <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class=" form-control" id="telefono" name="telefono" type="text" value='{{Request::old('telefono')}}'>
                                        @if ($errors->has('telefono'))
                                            <label for="telefono" class="control-label text-left text-danger">{{$errors->first('telefono')}}</label>
                                        @endif
                                    </div>
                                    <label for="rut" class="control-label col-lg-2">RUT <span class="required">*</span></label>
                                    <div class="col-lg-4">
                                        <input class=" form-control" id="rut" name="rut" type="text" value='{{Request::old('rut')}}'>
                                        @if ($errors->has('rut'))
                                            <label for="rut" class="control-label text-left text-danger">{{$errors->first('rut')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="especialidades" class="control-label col-lg-2">Especialidades</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="especialidades[]" id="especialidades[]" multiple="multiple">
                                            @foreach ($specialties as $specialty)
                                                <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('especialidades'))
                                            <label for="especialidades" class="control-label text-left text-danger">{{$errors->first('especialidades')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ route('vet.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
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
