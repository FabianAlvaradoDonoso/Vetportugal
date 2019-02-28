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
            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Servicio</li>
        </ol>
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

        {!! Form::open(['route' =>'Service.store','action' => 'Service@store', 'method'=>'POST','files'=>true])!!}
            @include('pagesystem.Service.form')
            {!! Form::submit('Guardar', ['class'=> 'btn btn-primary'])!!}
        {!! Form::close()!!}
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
