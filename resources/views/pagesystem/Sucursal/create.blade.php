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
                <a href="" class="btn btn-primary btn-sm">Nuevo Sucursal</a>
            {{-- @endif --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Sucursal</li>
        </ol>

    </section>


    <section class="content">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>            
                    @endforeach
            </ul>                
        </div>
        @endif
        
        {!! Form::open(['route' =>'Sucursal.store','action' => 'Sucursal@store', 'method'=>'POST','files'=>true])!!}
            @include('pagesystem.Sucursal.form')
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
