@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Carousels - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('css')

{{-- <link rel="stylesheet" href="{{asset('vetportugal/css/style.css')}}">
<link rel="stylesheet" href="{{asset('vetportugal/css/flexslider.css')}}"> --}}

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Nosotros
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dash')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{route('Abouts.index')}}"> Nosotros</a></li>
            <li class="active">Editar</li>
        </ol>

    </section>


    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edición Nosotros</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('Abouts.update', $about->id)}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="box-body">
                    <div class="form-group {{ ($errors->first('description')) ? 'has-error'  :''}}" id="formNombre">
                        <label for="description" class="col-sm-2 control-label">Descripcion</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required="true">{{$about->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('mission')) ? 'has-error'  :''}}" id="formPrecio">
                        <label for="mission" class="col-sm-2 control-label">Misión</label>
                        <div class="col-sm-10">
                            <textarea name="mission" id="mission" cols="30" rows="10" class="form-control" required="true">{{$about->mission}}</textarea>
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('vision')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="vision" class="col-sm-2 control-label">Vision</label>
                        <div class="col-sm-10">
                            <textarea name="vision" id="vision" cols="30" rows="10" class="form-control" required="true">{{$about->vision}}</textarea>
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('choose')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="choose" class="col-sm-2 control-label">Por qué elegirnos</label>
                        <div class="col-sm-10">
                            <textarea name="choose" id="choose" cols="30" rows="10" class="form-control" required="true">{{$about->choose}}</textarea>
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('imagen')) ? 'has-error'  :''}}" id="">
                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-10">
                            <input style="display: none;" type="file" src="" alt="" class="form-control" value="" id="imagen" name="imagen" onchange="cambiarImagen()">
                            <label for="imagen">
                                <div for="imagen" id="colocar" name="colocar" class="row invoice-info">
                                    <img id="showImg" name="showImg" style="height: 300px; width:300px; margin-left: 15vw; margin-top: 5%;" src="/vetportugal/images/{{$about->image}}" alt="Card image cap" class="">
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ route('Abouts.index') }}"class="btn btn-danger">Cancelar</a>
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
