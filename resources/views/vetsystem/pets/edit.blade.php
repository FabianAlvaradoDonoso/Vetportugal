@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-syringe"></i> Vacunas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-syringe"></i><a href="{{route('vaccine.index')}}">Vacunas</a></li>
                <li><i class="fa fa-pen"></i>Editar</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Edición de Vacuna
                        </strong>
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
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{ route('vaccine.update',$vaccine->id) }}" novalidate="novalidate">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-group ">
                                    <label for="nombre" class="control-label col-lg-2">Nombre <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="nombre" name="nombre" type="text" value="{{$vaccine->name}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ url()->previous() }}"class="btn btn-danger pull-rigth">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
  <!-- /.content-wrapper -->
@endsection
