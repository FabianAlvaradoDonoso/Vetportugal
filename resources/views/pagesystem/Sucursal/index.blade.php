@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Sucursales - AutoAdmin</title>
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
            Sucursales
            <small>Listado</small>
            {{-- @if (Auth::User()->roles->first()->pivot->role_id == 1) --}}
                <a href="{{route('Sucursal.create')}}" class="btn btn-primary btn-sm">Nuevo Sucursal</a>
            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Sucursales</li>
        </ol>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" id="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Éxito!</h4>
            {{$message}}
        </div>
    @endif

    </section>


    <section class="content">
        <div class="container">
            <div class="row">
                @foreach ($Sucursals as $Sucursal)
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                            <img src="/vetportugal/images/{{$Sucursal->imagen}}" alt="" class="img-rounded img-responsive" />
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4>{{$Sucursal->name}}</h4>
                                <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                                </i></cite></small>
                                <p>
                                    <i class="glyphicon glyphicon-envelope"></i>{{$Sucursal->mail}}
                                    <br />
                                    <i class="glyphicon glyphicon-gift"></i>{{$Sucursal->maplink}}
                                    <i class="glyphicon glyphicon-gift"></i>{{$Sucursal->youtubevideo}}
                                </p>
                                <!-- Split button -->
                                <div class="btn-group">
                             
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span><span class="sr-only">Social</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                        <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                 
                                    <p><a class="btn btn-success btn-sm btn-learn" href="{{route('Sucursal.edit',$Sucursal->slug)}}">Editar</a></p>
                                            {!! Form::open([ 'route' => ['Sucursal.destroy', $Sucursal->slug], 'method'=>'DELETE'])!!}
                                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm'])!!}
                                            {!! Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach
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
