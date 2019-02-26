<!DOCTYPE html>

@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
        <h3 class="page-header"><i class="fas fa-user-md"></i></i> Especialidades</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fas fa-user-md"></i><a href="{{route('client.index')}}">Especialidades</a></li>
            <li><i class="fa fa-plus"></i>Nuevo</li>
        </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Ingreso Nueva Especialidad
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('specialty.store')}}" novalidate="novalidate">
                            @csrf
                            <div class="form-group ">
                                <label for="nombre" class="control-label col-lg-2">Nombre<span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" value="{{Request::old('nombre')}}">
                                    @if ($errors->has('nombre'))
                                        <label for="nombre" class="control-label text-left text-danger">{{$errors->first('nombre')}}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="opciones" class="control-label col-lg-2">Opciones</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="opciones[]" id="opciones[]" multiple="multiple">
                                        @foreach ($breeds as $breed)
                                            <option value="{{$breed->name}}">{{$breed->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @if ($errors->has('opciones'))
                                        <label for="opciones" class="control-label text-left text-danger">{{$errors->first('opciones')}}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                    <a href="{{ route('specialty.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection
