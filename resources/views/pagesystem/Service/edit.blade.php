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
            <small>Editar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class=""><a href="{{ route('Service.index') }}">Servicios</a></li>
            <li class="active">Editar</li>
        </ol>

    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Servicio</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('Service.update',$Service)}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="box-body">
                    <div class="form-group {{ ($errors->first('name')) ? 'has-error'  :''}}" id="formNombre">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                                <input id="name" name="name" value="{{$Service->name}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('description')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="description" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                            <input id="description" name="description" value="{{$Service->description}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('price')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="price" class="col-sm-2 control-label">Precio</label>
                        <div class="col-sm-10">
                            <input id="price" name="price" value="{{$Service->price}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('image')) ? 'has-error'  :''}}" id="">
                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" src="" alt="" class="form-control" value="{{$Service->image}}" id="imagen" name="imagen" onchange="cambiarImagen()">
                            <label for="imagen">
                                <div for="imagen" id="colocar" name="colocar" class="row invoice-info">
                                    <img id="showImg" name="showImg" style="height: 200px; width:200px; margin-left: 15vw; margin-top: 5%;" src="/vetportugal/images/{{$Service->imagen}}" alt="Card image cap" class="">
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
  <script src="{{asset("js/changeImage.js")}}"></script>
@endsection
