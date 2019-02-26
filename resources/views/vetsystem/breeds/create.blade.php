@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fas fa-dog"></i> Razas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fas fa-dog"></i><a href="{{route('vaccine.index')}}">Razas</a></li>
                <li><i class="fa fa-plus"></i>Nueva</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Ingreso Nueva Raza
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('breed.store')}}" novalidate="novalidate">
                                @csrf



                                <div class="form-group ">
                                    <label for="nombre" class="control-label col-lg-2">Nombre<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" value="{{Request::old('sintoma')}}">
                                        @if ($errors->has('nombre'))
                                            <label for="nombre" class="control-label text-left text-danger">{{$errors->first('nombre')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label for="especie" class="control-label col-lg-2">Especie<span class="required">*</span></label>
                                    <div class="col-lg-10">
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
                                            <label for="especie" class="control-label text-left text-danger">{{$errors->first('especie')}}</label>
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

@section('scripts')
    <script src="{{asset("js/SelectPet.js")}}"></script>


@endsection
