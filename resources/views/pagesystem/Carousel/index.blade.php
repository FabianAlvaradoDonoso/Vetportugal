@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Carousels - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('css')

<link rel="stylesheet" href="{{asset('vetportugal/css/style.css')}}">

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Carousels
            <small>Listado</small>
            {{-- @if (Auth::User()->roles->first()->pivot->role_id == 1) --}}
                <a href="{{route('Carousel.create')}}" class="btn btn-primary btn-sm">Nuevo Carousel</a>
            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Carousels</li>
        </ol>

    </section>


    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Listado Carousels</h3>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                        {{$message}}
                    </div>
                @endif
                <div class="row">
                    <h1>Estas en Carousels!</h1>
           
                </div>


            </div>
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
