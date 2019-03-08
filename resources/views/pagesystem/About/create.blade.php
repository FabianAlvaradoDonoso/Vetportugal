@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Carousel - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Carousel
            <small>Crear</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('dash')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{Route('Carousel.index')}}"> Carousel</a></li>
            <li><a href="#"> Creación</a></li>
        </ol>

    </section>


    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Doctor</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('Carousel.store')}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group {{ ($errors->first('name')) ? 'has-error'  :''}}" id="formNombre">
                        <label for="nombre" class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-10">
                                <input id="name" name="name" value="{{Request::old('name')}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('subtitle')) ? 'has-error'  :''}}" id="formPrecio">
                        <label for="subtitle" class="col-sm-2 control-label">Subtitulo</label>
                        <div class="col-sm-10">
                            <input id="subtitle" name="subtitle" value="{{Request::old('subtitle')}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('btntitle')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="btntitle" class="col-sm-2 control-label">Titulo del Botón</label>
                        <div class="col-sm-10">
                            <input id="btntitle" name="btntitle" value="{{Request::old('btntitle')}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('linkbtn')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="linkbtn" class="col-sm-2 control-label">Enlace del Botón</label>
                        <div class="col-sm-10">
                            <input id="linkbtn" name="linkbtn" value="{{Request::old('linkbtn')}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('imagen')) ? 'has-error'  :''}}" id="">
                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" src="" alt="" class="form-control" value="" id="imagen" name="imagen" onchange="cambiarImagen()">
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
                        <a href="{{ route('Carousel.index') }}"class="btn btn-danger">Cancelar</a>
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
