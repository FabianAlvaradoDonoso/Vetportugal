@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fas fa-diagnoses"></i> Examenes de Pacientes</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fas fa-diagnoses"></i><a href="{{route('exampet.index')}}">Examenes</a></li>
                <li><i class="fa fa-pen"></i>Editar</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <strong>
                            Edición de Examen
                        </strong>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal " role="form" method="POST" action="{{ route('exampet.update',$exampet->id) }}" novalidate="novalidate">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-group" >
                                    <label for="cliente" class="control-label col-lg-2">Nombre Cliente</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="cliente" id="cliente" required>
                                            <option value="" selected disabled>Seleccione Cliente...</option>
                                            @foreach ($users as $user)
                                                @if ($user->role_id == 3)
                                                    @if ($exampet->pet->client->user->id == $user->id)
                                                        <option value="{{$user->id}}" selected>{{$user->name}} {{$user->last_name}}</option>
                                                    @else
                                                        <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('cliente'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('nombre')}}</label>
                                        @endif
                                    </div>
                                    <label for="mascota" class="control-label col-lg-2">Nombre Mascota</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" name="oldValue" id="oldValue" value={{$exampet->pet_id}}>
                                        <select class="form-control" name="mascota" id="mascota">
                                            <option value="" selected disabled>Mascota...</option>
                                        </select>
                                        @if ($errors->has('mascota'))
                                            <label for="mascota" class="control-label text-left text-danger">{{$errors->first('mascota')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label for="proceso" class="control-label col-lg-2">Tipo Examen</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="proceso" id="proceso" required>
                                            <option value="" selected disabled>Seleccione Examen...</option>
                                            @foreach ($exams as $exam)
                                                @if ($exam->id == $exampet->exam_id)
                                                    <option value="{{$exam->id}}" selected>{{$exam->name}}</option>
                                                @else
                                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('proceso'))
                                            <label for="proceso" class="control-label text-left text-danger">{{$errors->first('proceso')}}</label>
                                        @endif
                                    </div>
                                    <label for="vista" class="control-label col-lg-2">Vista</label>
                                    <div class="col-lg-4">
                                        <input class=" form-control" id="vista" name="vista" type="text" value="{{$exampet->views}}"">
                                        @if ($errors->has('vista'))
                                            <label for="vista" class="control-label text-left text-danger">{{$errors->first('vista')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="estado" class="control-label col-lg-2">Estado</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="estado" id="estado" required>
                                            <option value="" selected disabled>Seleccione Estado...</option>
                                            {{-- <option value="NT" @if ($exampet->status == 'NT') selected @endif>Muestra No Tomada</option> --}}
                                            <option value="MR" @if ($exampet->status == 'MR') selected @endif>Muestra Retirada</option>
                                            <option value="RR" @if ($exampet->status == 'RR') selected @endif>Resultado Recibido</option>
                                            <option value="RE" @if ($exampet->status == 'RE') selected @endif>Resultado Entregado</option>
                                            <option value="HR" @if ($exampet->status == 'HA') selected @endif>Hora Agendada</option>
                                        </select>
                                        @if ($errors->has('estado'))
                                            <label for="estado" class="control-label text-left text-danger">{{$errors->first('estado')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <a href="{{ route('exampet.index') }}"class="btn btn-danger pull-rigth">Cancelar</a>
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
@section('scripts')
    <script src="{{asset("js/SelectPet.js")}}"></script>
    <script>
        var select=document.getElementById("mascota");

        // obtenemos el valor a buscar
        var buscar=document.getElementById("oldValue").value;

        // recorremos todos los valores del select
        for(var i=1;i<select.length;i++)
        {
            if(select.options[i].text==buscar)
            {
                // seleccionamos el valor que coincide
                select.selectedIndex=i;
            }
        }
    </script>
@endsection
