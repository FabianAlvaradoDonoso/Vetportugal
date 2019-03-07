@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Servicios - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('css')

<link rel="stylesheet" href="{{asset('vetportugal/css/style.css')}}">
<link rel="stylesheet" href="{{asset('vetportugal/css/flexslider.css')}}">

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
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
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
                                    <div class="col-md-4">
                                        <div class="department-wrap animate-box">
                                        <div class="grid-1 col-md-6" style="background-image: url(vetportugal/images/{{$Service->imagen}});"></div>
                                            <div class="grid-2 col-md-6">
                                                <div class="desc">
                                                    <h2><a href="departments-single.html">{{$Service->name}}</a></h2>
                                                    <p>{{$Service->description}}</p>
                                                    <div class="department-info">
                                                        <div class="block">
                                                            <h2>{{$Service->resumen}}</h2>
                                                            <span>{{$Service->description}}</span>
                                                        </div>
                                                        <div class="block">
                                                            <p><a class="btn btn-success btn-sm btn-learn" href="{{route('Service.edit', $Service->slug)}}">Editar</a></p>
                                                            {!! Form::open([ 'route' => ['Service.destroy', $Service->slug], 'method'=>'DELETE'])!!}
                                                               {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm'])!!}
                                                           {!! Form::close()!!}
                                                        </div>                                       
                                                    </div>
                                                </div>
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
