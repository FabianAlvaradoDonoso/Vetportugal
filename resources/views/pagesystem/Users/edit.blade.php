@extends('layouts.app2')

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
            <li class=""><a href={{route('product.index')}}>Productos</a></li>
            <li class="active">Edición</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Producto</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('product.update', $product->id)}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="box-body">
                    <div class="form-group" id="formNombre">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="texto" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value={{$product->name}}>
                            @if ($errors->has('nombre'))
                                <span class="help-block">{{$errors->first('nombre')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="formPrecio">
                        <label for="precio" class="col-sm-2 control-label">Precio</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="number" class="form-control" id="precio" name="precio" value={{$product->price}}>
                            </div>
                            @if ($errors->has('precio'))
                                <span class="help-block">{{$errors->first('precio')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="formDescripcion">
                        <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Descripción">{{$product->description}}</textarea>
                            @if ($errors->has('descripcion'))
                                <span class="help-block">{{$errors->first('descripcion')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="formCategoria">
                        <label for="categoria" class="col-sm-2 control-label">Categoría</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="categoria" id="categoria">
                                <option value="" selected disabled>Seleccione Categoría...</option>
                                @foreach ($categories as $category)
                                    @if ($product->category_id == $category->id)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('categoria'))
                                <span class="help-block">{{$errors->first('categoria')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="">
                        <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" src="" alt="" class="form-control" value={{$product->image}} id="imagen" name="imagen" onchange="cambiarImagen()">
                            <label for="imagen">
                                <div for="imagen" id="colocar" name="colocar" class="row invoice-info">
                                    <img id="showImg" name="showImg" style="height: 200px; width:200px; margin-left: 15vw; margin-top: 5%;" src="/images/products/{{$product->image}}" alt="Card image cap" class="">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="formDestacado">
                        <label for="destacado" class="col-sm-2 control-label">Otro</label>
                        <div class="col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="destacado" name="destacado" @if ($product->outstanding) checked @endif>
                                    Destacado
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ route('product.index') }}"class="btn btn-danger">Cancelar</a>
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
