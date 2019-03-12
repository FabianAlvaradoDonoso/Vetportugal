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
            <small>Edición</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class=""><a href={{route('Product.index')}}>Productos</a></li>
            <li class="active">Edición</li>
        </ol>
    </section>

    <section class="content">

{!! Form::model($Product, ['route' =>['Product.update',$Product], 'method'=>'PUT','files'=>true])!!}
    @include('pagesystem.Product.form')
    {!! Form::submit('Actualizar', ['class'=> 'btn btn-primary'])!!}
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
    @if ($errors->has('precio'))
        <script>
            jQuery( "#formPrecio" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('descripcion'))
        <script>
            jQuery( "#formDescripcion" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('categoria'))
        <script>
            jQuery( "#formCategoria" ).addClass( "has-error" );
        </script>
    @endif


    <script src="{{asset("js/changeImage.js")}}"></script>
@endsection
