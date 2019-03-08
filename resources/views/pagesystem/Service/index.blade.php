@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Servicios - AutoAdmin</title>
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
            Servicios
            <small>Listado</small>
            {{-- @if (Auth::User()->roles->first()->pivot->role_id == 1) --}}
                <a href="{{route('Service.create')}}" class="btn btn-primary btn-sm">Nuevo Servicio</a>
            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dash')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Servicios</li>
        </ol>

    </section>


    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Listado Servicios</h3>
            </div>

            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                        {{$message}}
                    </div>
                @endif
                <div class="colorlib-departments">
                    <div class="container">
                        <div class="row">
                            @foreach ($Services as $Service)
                                <div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
                                    <div class="doctor">
                                        <div class="" style="">
                                            <img id="showImg" name="showImg" style="height: 150px; width: 150px;" src="/vetportugal/images/{{$Service->imagen}}" alt="Card image cap" class="">
                                        </div>
                                        <div class="desc">
                                            <span>{{$Service->description}}</span>
                                            <h3>{{$Service->name}}</h3>

                                            <a href="{{route('Service.edit', $Service->slug)}}" class="btn btn-success "> Editar</a>
                                            <a class="btn btn-danger" href="" onclick="event.preventDefault(); document.getElementById('delete-form-{{$Service->slug}}').submit();" > Eliminar</a>
                                            <form id="delete-form-{{$Service->slug}}" action="{{route('Service.destroy', $Service->slug)}}" method="POST" style="display: none;">
                                                @csrf
                                                {{method_field('DELETE')}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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
