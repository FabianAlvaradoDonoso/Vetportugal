<!DOCTYPE html>

@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-user"></i> Clientes</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-home"></i><a href="{{route('client.index')}}">Clientes</a></li>
            <li><i class="fa fa-plus"></i>Nuevo</li>
        </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Ingreso Nuevo Cliente
                </header>
                <div class="panel-body">
                    @if (count($errors)>0)

                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <strong>Error!</strong> {{$error}}.
                            </div>

                        @endforeach

                    @endif
                    <div class="form">
                        <form class="form-validate form-horizontal " role="form" method="POST" action="{{route('client.store')}}" novalidate="novalidate">
                            @csrf
                            <div class="form-group ">
                                <label for="nombre" class="control-label col-lg-2">Nombre <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="nombre" name="nombre" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="direccion" class="control-label col-lg-2">Dirección <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="direccion" name="direccion" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="comuna" class="control-label col-lg-2">Comuna <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="comuna" id="comuna">
                                        <option value="" selected>Selecione Comuna...</option>
                                        {{-- <option value="1" >aas</option> --}}
                                        @foreach ($communes as $commune)
                                            <option value="{{$commune->id}}">{{$commune->commune}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="rut" class="control-label col-lg-2">Rut <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="rut" name="rut" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="telefono" class="control-label col-lg-2">Telefono <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="telefono" name="telefono" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                    <a href="{{ route('client.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection
