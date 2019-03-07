@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Doctores - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('css')

{{-- <link rel="stylesheet" href="{{asset('vetportugal/css/style.css')}}"> --}}

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Doctores
            <small>Listado</small>
            {{-- @if (Auth::User()->roles->first()->pivot->role_id == 1) --}}
                <a href="{{route('Docs.create')}}" class="btn btn-primary btn-sm">Nuevo Doctor</a>
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
                <h3 class="box-title">Listado Doctores</h3>
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
                    @foreach ($Docs as $Doc)
                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
                        <div class="doctor">
                            <div class="" style="">
                                <img id="showImg" name="showImg" style="height: 150px; width: 150px;" src="/vetportugal/images/{{$Doc->image}}" alt="Card image cap" class="">
                            </div>
                            <div class="desc">
                                <span>{{$Doc->specialty}}</span>
                                <h3>Dr. {{$Doc->name}}</h3>

                                <a href="{{route('Docs.edit', $Doc->slug)}}" class="btn btn-success "> Editar</a>
                                <a class="btn btn-danger" href="" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" > Eliminar</a>
                                <form id="delete-form" action="{{route('Docs.destroy', $Doc->slug)}}" method="POST" style="display: none;">
                                    @csrf
                                    {{method_field('DELETE')}}
                                </form>
                                {{-- <form class="" action="{{route('Docs.destroy', $Doc->slug)}}" method="post">
                                    @csrf
                                    <a type="submit" class="btn btn-danger ">Eliminar</a>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
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
