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
            <small>Listado</small>
            {{-- @if (Auth::User()->roles->first()->pivot->role_id == 1) --}}
                <a href="NewDoc" class="btn btn-primary btn-sm">Nuevo Carousel</a>
            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Carousel</li>
        </ol>

    </section>


    <section class="content">

        {!! Form::model($Carousel, ['route' =>['Carousel.update',$Carousel], 'method'=>'PUT','files'=>true])!!}
            @include('pagesystem.Carousel.form')
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
