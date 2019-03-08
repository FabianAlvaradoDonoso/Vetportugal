@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Servicio - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Servicios
            <small>Crear</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class=""><a href="{{ route('Service.index') }}">Servicios</a></li>
            <li class="active">Creación</li>
        </ol>

    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Servicio</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('Service.store')}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group {{ ($errors->first('name')) ? 'has-error'  :''}}" id="formNombre">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                                <input id="name" name="name" value="{{Request::old('name')}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('description')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="description" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                            <input id="description" name="description" value="{{Request::old('description')}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('price')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="price" class="col-sm-2 control-label">Precio</label>
                        <div class="col-sm-10">
                            <input id="price" name="price" value="{{Request::old('price')}}" class="form-control" required="true" value="" type="number">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('imagen')) ? 'has-error'  :''}}" id="">
                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" src="" alt="" class="form-control" value="{{Request::old('imagen')}}" id="imagen" name="imagen" onchange="cambiarImagen()">
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
                        <a href="{{ route('Service.index') }}"class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-primary ml-3" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
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
