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
            <small>Listado</small>
            {{-- @if (Auth::User()->roles->first()->pivot->role_id == 1) --}}
                <a href="NewDoc" class="btn btn-primary btn-sm">Nuevo Doctor</a>
            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Doctores</li>
        </ol>

    </section>


    <section class="content">
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
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="name" value="{{$Doc->name}}" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>                        
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Especialidad</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="specialty" name="specialty" value="{{$Doc->specialty}}" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Descripción</label>
                                    <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"></span><input id="description" name="description" value="{{$Doc->description}}" class="form-control" required="true" value="" type="text"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group" id="formImagen">
                                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="imagen">
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
                            <img src="/vetportugal/images/{{$Doc->image}}" id="blah" alt="" width="250" height="250">
                        </td>
                    </tr>
                </tbody>
                </table>
              
            </div>
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
