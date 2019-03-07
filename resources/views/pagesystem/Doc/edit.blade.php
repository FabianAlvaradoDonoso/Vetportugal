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
            <small>Editar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class=""><a href="{{ route('Docs.index') }}">Doctores</a></li>
            <li class="active">Editar</li>
        </ol>

    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Doctor</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('Docs.update',$Doc)}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="box-body">
                    <div class="form-group" id="formNombre">
                        <label for="nombre" class="col-sm-2 control-label">Nombre y Apellido</label>
                        <div class="col-sm-10">
                                <input id="fullName" name="name" value="{{$Doc->name}}" class="form-control" required="true" value="" type="text">
                            @if ($errors->has('nombre'))
                                <span class="help-block">{{$errors->first('nombre')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="formPrecio">
                        <label for="precio" class="col-sm-2 control-label">Especialidad</label>
                        <div class="col-sm-10">
                            <input id="specialty" name="specialty" value="{{$Doc->specialty}}" class="form-control" required="true" value="" type="text">
                            @if ($errors->has('precio'))
                                <span class="help-block">{{$errors->first('precio')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="formDescripcion">
                        <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                            <input id="description" name="description" value="{{$Doc->description}}" class="form-control" required="true" value="" type="text">
                            @if ($errors->has('descripcion'))
                                <span class="help-block">{{$errors->first('descripcion')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="">
                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" src="" alt="" class="form-control" value={{$Doc->image}} id="imagen" name="imagen" onchange="cambiarImagen()">
                            <label for="imagen">
                                <div for="imagen" id="colocar" name="colocar" class="row invoice-info">
                                    <img id="showImg" name="showImg" style="height: 200px; width:200px; margin-left: 15vw; margin-top: 5%;" src="/vetportugal/images/{{$Doc->image}}" alt="Card image cap" class="">
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
                <h3 class="box-title">Editando</h3>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                        {{$message}}
                    </div>
                @endif


                <table class="table table-striped">
                <tbody>
                    <tr>
                        <td colspan="1">
                        <form class="well form-horizontal" action="{{route('Docs.update',$Doc)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre y Apellido</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <input id="fullName" name="name" value="{{$Doc->name}}" class="form-control" required="true" value="" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Especialidad</label>
                                    <div class="col-md-8">
                                        <input id="specialty" name="specialty" value="{{$Doc->specialty}}" class="form-control" required="true" value="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Descripción</label>
                                    <div class="col-md-8">
                                        <input id="description" name="description" value="{{$Doc->description}}" class="form-control" required="true" value="" type="text">
                                    </div>
                                </div>

                                <div class="form-group" id="formImagen">
                                        <label for="imagen" class="col-md-4 control-label">Imagen</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" name="imagen">
                                            @if ($errors->has('imagen'))
                                                <span class="help-block">{{$errors->first('imagen')}}</span>
                                            @endif
                                        </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 text-right">
                                        <button class="btn btn-success ml-3" type="submit">Guardar</button>
                                        <a href="{{ route('Docs.index') }}"class="btn btn-danger">Volver</a>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                        </td>
                        <td colspan="1">
                            <img src="/vetportugal/images/{{$Doc->image}}" id="blah" alt="" width="250" height="250">
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

 <script src="{{asset("js/changeImage.js")}}"></script>
@endsection
