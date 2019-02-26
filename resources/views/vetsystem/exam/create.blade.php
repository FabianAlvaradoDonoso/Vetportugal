@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-paw"></i> Tipos de Examenes</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-paw"></i><a href="{{route('exam.index')}}">Tipos de Examenes</a></li>
                <li><i class="fa fa-plus"></i>Nuevo</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Ingreso Nuevo Tipo de Examen
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('exam.store')}}" novalidate="novalidate">
                                @csrf
                                <div class="form-group ">
                                    <label for="nombre" class="control-label col-lg-2">Nombre <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="nombre" name="nombre" type="text" value={{Request::old('nombre')}}>
                                        @if ($errors->has('nombre'))
                                            <label for="nombre" class="control-label text-left text-danger">{{$errors->first('nombre')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="caracteristicas" class="control-label col-lg-2">Caracteristicas <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="caracteristicas" name="caracteristicas" type="text" value={{Request::old('caracteristicas')}}>
                                        @if ($errors->has('caracteristicas'))
                                            <label for="caracteristicas" class="control-label text-left text-danger">{{$errors->first('caracteristicas')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="vistas" class="control-label col-lg-2">Vistas <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="vistas" name="vistas" type="text" value={{Request::old('vistas')}}>
                                        @if ($errors->has('vistas'))
                                            <label for="vistas" class="control-label text-left text-danger">{{$errors->first('vistas')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="tipo" class="control-label col-lg-2">Tipo <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="tipo" id="tipo" required>
                                            <option value="" selected disabled>Elegir Tipo...</option>
                                            <option value="General">General</option>
                                            <option value="Quirurgico">Quirurgico</option>
                                            <option value="Radiografico">Radiografico</option>
                                        </select>
                                        @if ($errors->has('tipo'))
                                            <label for="tipo" class="control-label text-left text-danger">{{$errors->first('tipo')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ route('exam.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
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
