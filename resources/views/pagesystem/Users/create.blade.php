@extends('layouts.app2')

{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Usuario | Creación - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}


{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Usuarios
            <small>Nuevo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class=""><a href={{route('user.index')}}>Usuarios</a></li>
            <li class="active">Nuevo</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Usuario</h3>
            </div>
            <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('user.store')}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group" id="formNombre">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="texto" class="form-control" id="nombre" name="nombre" placeholder="Nombre Usuario" value={{Request::old('nombre')}}>
                            @if ($errors->has('nombre'))
                                <span class="help-block">{{$errors->first('nombre')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="formEmail">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input placeholder="Email" type="email" class="form-control" id="email" name="email" value={{Request::old('email')}}>
                            @if ($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="formContraseña">
                        <label for="contraseña" class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña" value={{Request::old('contraseña')}}>
                            @if ($errors->has('contraseña'))
                                <span class="help-block">{{$errors->first('contraseña')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" id="formContraseñaR">
                        <label for="contraseñaR" class="col-sm-2 control-label">Repetir Contraseña</label>
                        <div class="col-sm-10">
                            <input placeholder="Repetir Contraseña" type="password" src="" alt="" class="form-control" id="contraseñaR" name="contraseñaR" value={{Request::old('contraseñaR')}}>
                            @if ($errors->has('contraseñaR'))
                                <span class="help-block">{{$errors->first('contraseñaR')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="formCuenta">
                        <label for="cuenta" class="col-sm-2 control-label">Tipo Cuenta</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="cuenta" id="cuenta">
                                <option value="" selected disabled>Seleccione Tipo de Cuenta...</option>
                                @foreach ($roles as $role)
                                    @if (Request::old('cuenta') == $role->id)
                                        <option value="{{$role->id}}" selected>{{$role->description}}</option>
                                    @else
                                        <option value="{{$role->id}}">{{$role->description}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('cuenta'))
                                <span class="help-block">{{$errors->first('cuenta')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ route('user.index') }}"class="btn btn-danger">Cancelar</a>
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
    @if ($errors->has('email'))
        <script>
            jQuery( "#formEmail" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('contraseña'))
        <script>
            jQuery( "#formContraseña" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('contraseñaR'))
        <script>
            jQuery( "#formContraseñaR" ).addClass( "has-error" );
        </script>
    @endif
    @if ($errors->has('cuenta'))
        <script>
            jQuery( "#formCuenta" ).addClass( "has-error" );
        </script>
    @endif

@endsection
