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
            <li class="active">Nosotros</li>
        </ol>

    </section>


    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Sobre Nosotros</h3>
            </div>
            <form class="form-validate form-horizontal ">
                <div class="box-body">
                    <a href="{{route('Abouts.edit', 1)}}" class="btn btn-success btn-block">Editar</a>
                    <div class="form-group {{ ($errors->first('description')) ? 'has-error'  :''}}" id="formNombre">
                        <label for="description" class="col-sm-2 control-label">Descripcion</label>
                        <div class="col-sm-9">
                            <h4 ALIGN="justify" name="description" id="description">{{$about->description}}</h4>
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('mission')) ? 'has-error'  :''}}" id="formPrecio">
                        <label for="mission" class="col-sm-2 control-label">Misión</label>
                        <div class="col-sm-9">
                            <h4 ALIGN="justify" name="mission" id="mission">{{$about->mission}}</h4>
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('vision')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="vision" class="col-sm-2 control-label">Vision</label>
                        <div class="col-sm-9">
                            <h4 ALIGN="justify" name="vision" id="vision">{{$about->vision}}</h4>
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('choose')) ? 'has-error'  :''}}" id="formDescripcion">
                        <label for="choose" class="col-sm-2 control-label">Por qué elegirnos</label>
                        <div class="col-sm-9">
                            <h4 ALIGN="justify" name="choose" id="choose">{{$about->choose}}</h4>
                        </div>
                    </div>
                    <div class="form-group {{ ($errors->first('imagen')) ? 'has-error'  :''}}" id="">
                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-9">
                            <div for="imagen" id="colocar" name="colocar" class="row invoice-info">
                                <img id="showImg" name="showImg" style="height: 300px; width:300px; margin-left: 15vw; margin-top: 5%;" src="/vetportugal/images/{{$about->image}}" alt="Card image cap" class="">
                            </div>

                        </div>
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
@endsection
