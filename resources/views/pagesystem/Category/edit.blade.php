@extends('layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Categorias | Edición - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}


{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Categorías
            <small>Edición</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class=""><a href={{route('category.index')}}>Categorias</a></li>
            <li class="active">Edición</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Categoría</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{ route('category.update',$category->id) }}" novalidate="novalidate">
                @csrf
                {{method_field('PUT')}}
                <div class="box-body">
                    <div class="form-group" id="formNombre">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="texto" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value={{$category->name}}>
                            @if ($errors->has('nombre'))
                                <span class="help-block">{{$errors->first('nombre')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" if="formDescripcion">
                        <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción">{{$category->description}}</textarea>
                            @if ($errors->has('descripcion'))
                                <span class="help-block">{{$errors->first('descripcion')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ route('category.index') }}"class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-primary ml-3" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('scripts')


    @if ($errors->has('nombre'))
        <script>
            jQuery( "#formNombre" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('descripcion'))
        <script>
            jQuery( "#formDescripcion" ).addClass( "has-error" );
        </script>
    @endif


@endsection
