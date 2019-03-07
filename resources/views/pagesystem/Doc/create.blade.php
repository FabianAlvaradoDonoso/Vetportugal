@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Doctores - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Doctores
            <small>Crear</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('dash')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{Route('Docs.index')}}"> Doctores</a></li>
            <li><a href="#"> Creación</a></li>
        </ol>

    </section>

    <section class="content">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Doctor</h3>
                </div>
                <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('Docs.store')}}" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group" id="formNombre">
                            <label for="nombre" class="col-sm-2 control-label">Nombre y Apellido</label>
                            <div class="col-sm-10">
                                    <input id="name" name="name" value="{{Request::old('fullName')}}" class="form-control" required="true" value="" type="text">
                                @if ($errors->has('nombre'))
                                    <span class="help-block">{{$errors->first('nombre')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group" id="formPrecio">
                            <label for="precio" class="col-sm-2 control-label">Especialidad</label>
                            <div class="col-sm-10">
                                <input id="specialty" name="specialty" value="{{Request::old('specialty')}}" class="form-control" required="true" value="" type="text">
                                @if ($errors->has('precio'))
                                    <span class="help-block">{{$errors->first('precio')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group" id="formDescripcion">
                            <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <input id="description" name="description" value="{{Request::old('description')}}" class="form-control" required="true" value="" type="text">
                                @if ($errors->has('descripcion'))
                                    <span class="help-block">{{$errors->first('descripcion')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group" id="">
                            <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                            <div class="col-sm-10">
                                <input type="file" src="" alt="" class="form-control" value="{{Request::old('image')}}" id="imagen" name="imagen" onchange="cambiarImagen()">
                                <label for="imagen">
                                    <div for="imagen" id="colocar" name="colocar" class="row invoice-info">
                                        <img id="showImg" name="showImg" style="height: 200px; width:200px; margin-left: 15vw; margin-top: 5%;" src="/vetportugal/images/foto.png" alt="Card image cap" class="">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            <a href="{{ route('Docs.index') }}"class="btn btn-danger">Cancelar</a>
                            <button class="btn btn-primary ml-3" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    {{-- <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Doctores</h3>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                        {{$message}}
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
                @endif
                <table class="table table-striped">
                <tbody>
                    <tr>
                        <td colspan="1">
                        <form class="well form-horizontal" action="/Docs" method="POST" enctype="multipart/form-data">
                        @csrf
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre y Apellido</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="name" placeholder="Full Name" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Especialidad</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="specialty" name="specialty" placeholder="Dermatólogo" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Descripción</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="description" name="description" placeholder="Algo sobre su formación" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>

                                <div class="form-group" id="formImagen">
                                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="imagen" id="imagen">
                                            @if ($errors->has('imagen'))
                                                <span class="help-block">{{$errors->first('imagen')}}</span>
                                            @endif
                                        </div>
                                </div>
                                    <!--<div class="form-group" id="formDestacado">
                                        <label for="destacado" class="col-sm-2 control-label">Otro</label>
                                        <div class="col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="destacado" name="destacado" @if (Request::old('destacado')) checked @endif>
                                                    Destacado
                                                </label>
                                            </div>
                                        </div>
                                    </div>-->


                                <div class="box-footer">
                                    <div class="pull-right">
                                    <button class="btn btn-primary ml-3" type="submit">Guardar</button>
                                    <button class="btn btn-primary ml-3" type="close">Cerrar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        </td>
                        <td colspan="1">
                            <div class="row">
                                    <div class="col-md-3 text-center">
                                        <img class="img-fluid img-thumbnail" id="blah" name="blah" src="#" alt="" width="150" height="150">
                                    </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>

            </div>
        </div>
    </section> --}}
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('scripts')
    <script>
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
    </script>

    <script src="{{asset("js/changeImage.js")}}"></script>
@endsection
