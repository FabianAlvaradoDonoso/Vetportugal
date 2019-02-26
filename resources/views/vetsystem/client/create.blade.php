@extends('vetsystem.layout.master')

@section('content')

    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user"></i> Cliente</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{route('home')}}">Inicio</a></li>
                    <li><i class="fa fa-user"></i><a href="{{route('client.index')}}">Cliente</a></li>
                    <li><i class="fa fa-plus"></i>Crear</li>
                </ol>
            </div>
        </div>

        <div class="row" >
            <div class="col-lg-12 col-md-12" >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2><strong>Crear Cliente </strong> </h2>

                        <div class="panel-actions">
                            <a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                            <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                        </div>
                    </div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'client.store', 'files' => true , 'class' => 'form-horizontal']) !!}

                        @include('vetsystem.client.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
