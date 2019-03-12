@extends('pagesystem/layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Productos | Creación - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}


{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Productos
            <small>Nuevo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class=""><a href={{route('Product.index')}}>Productos</a></li>
            <li class="active">Nuevo</li>
        </ol>
    </section>

    <section class="content">

        {!! Form::open(['route' =>'Product.store','action' => 'Product@store', 'method'=>'POST','files'=>true])!!}
            @include('pagesystem.Product.form')
            {!! Form::submit('Guardar', ['class'=> 'btn btn-primary'])!!}
        {!! Form::close()!!}
    </section>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('scripts')

    @if ($errors->has('nombre'))
        <script>
            jQuery( "#formNombre" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('resumen'))
        <script>
            jQuery( "#formResumen" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('precio'))
        <script>
            jQuery( "#formPrecio" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('description'))
        <script>
            jQuery( "#formDescription" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('categoria'))
        <script>
            jQuery( "#formCategoria" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('imagen'))
        <script>
            jQuery( "#formImagen" ).addClass( "has-error" );
        </script>
    @endif

@endsection
