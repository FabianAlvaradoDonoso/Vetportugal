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
            Servicio
            <small>Listado</small>
            {{-- @if (Auth::User()->roles->first()->pivot->role_id == 1) --}}
                <a href="NewDoc" class="btn btn-primary btn-sm">Nuevo Servicio</a>
            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Servicio</li>
        </ol>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" id="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Éxito!</h4>
            {{$message}}
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>            
                    @endforeach
            </ul>                
        </div>
        @endif

    </section>


    <section class="content">

        {!! Form::model($Service, ['route' =>['Service.update',$Service], 'method'=>'PUT','files'=>true])!!}
            @include('pagesystem.Service.form')
            {!! Form::submit('Actualizar', ['class'=> 'btn btn-primary'])!!}
        {!! Form::close()!!}
    
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
