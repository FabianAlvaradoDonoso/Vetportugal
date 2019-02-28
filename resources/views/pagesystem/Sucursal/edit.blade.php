@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Sucursal - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Sucursal
            <small>Listado</small>
            {{-- @if (Auth::User()->roles->first()->pivot->role_id == 1) --}}

            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Sucursal</li>
        </ol>

    </section>


    <section class="content">

        {!! Form::model($Sucursal, ['route' => ['Sucursal.update',$Sucursal], 'method'=>'PUT','files'=>true])!!}
            @include('pagesystem.Sucursal.form')
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
