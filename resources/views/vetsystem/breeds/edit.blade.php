@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fas fa-dog"></i> Razas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fas fa-dog"></i><a href="{{route('breed.index')}}">Razas</a></li>
                <li><i class="fa fa-pen"></i>Editar</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Edición de Especie
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{ route('breed.update', $breed->id) }}" novalidate="novalidate">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-group ">
                                    <label for="nombre" class="control-label col-lg-2">Nombre <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="nombre" name="nombre" type="text" value="{{$breed->name}}" />
                                    </div>
                                    @if ($errors->has('nombre'))
                                        <label for="nombre" class="control-label col-lg-3 text-left text-danger">{{$errors->first('nombre')}}</label>
                                    @endif
                                </div>
                                <div class="form-group ">
                                    <label for="raza" class="control-label col-lg-2">Raza <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="raza" id="raza">
                                            <option value="" disabled selected>Seleccione Raza...</option>
                                            @foreach ($types as $type)
                                                @if($type->id == $breed->id)
                                                    <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                                @else
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('raza'))
                                            <label for="raza" class="control-label col-lg-3 text-left text-danger">{{$errors->first('raza')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ route('breed.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
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
