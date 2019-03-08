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
            <small>Editar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dash') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class=""><a href="{{ route('Carousel.index') }}"> Carousel</a></li>
            <li class="active">Editar</li>
        </ol>

    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Servicio</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('Carousel.update',$Carousel)}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="box-body">
                    <div class="form-group {{ ($errors->first('name')) ? 'has-error'  :''}}" id="formNombre">
                        <label for="name" class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-10">
                                <input id="name" name="name" value="{{$Carousel->name}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('subtitle')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="subtitle" class="col-sm-2 control-label">Sub-título</label>
                        <div class="col-sm-10">
                            <input id="subtitle" name="subtitle" value="{{$Carousel->subtitle}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('btntitle')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="btntitle" class="col-sm-2 control-label">Título del botón</label>
                        <div class="col-sm-10">
                            <input id="btntitle" name="btntitle" value="{{$Carousel->btntitle}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('linkbtn')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="linkbtn" class="col-sm-2 control-label">Enlace del botón</label>
                        <div class="col-sm-10">
                            <input id="linkbtn" name="linkbtn" value="{{$Carousel->linkbtn}}" class="form-control" required="true" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('image')) ? 'has-error'  :''}}" id="">
                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" src="" alt="" class="form-control" value="{{$Carousel->image}}" id="imagen" name="imagen" onchange="cambiarImagen()">
                            <label for="imagen">
                                <div for="imagen" id="colocar" name="colocar" class="row invoice-info">
                                    <img id="showImg" name="showImg" style="height: 200px; width:200px; margin-left: 15vw; margin-top: 5%;" src="/vetportugal/images/{{$Carousel->imagen}}" alt="Card image cap" class="">
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
    $(window).load(function(){

$(function() {
 $('#imagen').change(function(e) {
     addImage(e);
    });

    function addImage(e){
     var file = e.target.files[0],
     imageType = /image.*/;

     if (!file.type.match(imageType))
      return;

     var reader = new FileReader();
     reader.onload = fileOnload;
     reader.readAsDataURL(file);
    }

    function fileOnload(e) {
     var result=e.target.result;
     $('#blah').attr("src",result);
    }
   });
 });

 </script>
@endsection
