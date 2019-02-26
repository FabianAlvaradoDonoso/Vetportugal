@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" id="success-alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><i class="icon fa fa-check"></i>
                {{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('errores'))
            <div class="alert alert-danger alert-dismissible" id="success-alert2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><i class="icon fas fa-times"></i>
                {{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-syringe"></i>Controles</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-syringe"></i>Controles</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('control.create')}}" class="btn btn-info btn-block ">Crear Control</a>
            </div>
            {{-- <div class="col-lg-6">
                <a href="{{route('vaccine.create')}}" class="btn btn-default btn-block">Agregar Vacuna</a>
            </div> --}}
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <strong>
                            Controles
                        </strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-advance table-hover" id="example1">
                                <thead>
                                <tr>
                                    <th width="15%"><i class="fas fa-user"></i> Veterinario</th>
                                    <th width="15%"><i class="fas fa-user"></i> Tutor</th>
                                    <th width="10%"><i class="fas fa-paw"></i> Paciente</th>
                                    <th width="10%"><i class="fas fa-dog"></i>  <i class="fas fa-cat"></i> Especie</th>
                                    <th width="9%" class=""><i class="far fa-clock"></i> Fecha Atención</th>
                                    <th width="10%" class="text-center"><i class="icon_cogs"></i> Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($controls as $control)
                                        @foreach ($control->vets as $vet)
                                            <tr>
                                                <td>{{$vet->user->name}}</td>
                                                <td>{{$control->client->user->name}}</td>
                                                <td>{{$control->name}}</td>
                                                <td>{{$control->breed->name}}</td>
                                                <td>{{$vet->pivot->date}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#mostrar_control-{{$vet->pivot->id}}"><i class="fas fa-eye"></i></button>
                                                        {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-dismiss="modal" data-target="#editar_control-{{$vet->pivot->id}}"><i class="fas fa-pen"></i></button> --}}
                                                        <a href="{{route('control.edit', $vet->pivot->id)}}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_control-{{$vet->pivot->id}}"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal modal-info fade" id="mostrar_control-{{$vet->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i>&nbspControl</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <strong>Sintomas:</strong> {{$vet->pivot->symptom}}<br><br>
                                                            <strong>Diagnostico:</strong> {{$vet->pivot->diagnostic}}<br><br>
                                                            <strong>Descripción:</strong> {{$vet->pivot->description}}<br><br>
                                                            <strong>Veterinario Encargardo:</strong> {{$vet->user->name}}<br><br>
                                                            <strong>Fecha Atención:</strong> {{$vet->pivot->date}}<br><br>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <form class="" action="{{route('control.destroy', $vet->pivot->id)}}" method="post">
                                                                <a href="{{route('control.edit', $vet->pivot->id)}}" class="btn btn-success">Editar</a>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                                <button type="submit" class="btn btn-danger">Continuar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal modal-danger fade" id="eliminar_control-{{$vet->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar {{($vet->pivot->id)}}?
                                                        </div>
                                                        <div class="modal-footer">

                                                            <form class="" action="{{route('control.destroy', $vet->pivot->id)}}" method="post">

                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                                <button type="submit" class="btn btn-danger">Continuar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#example1').DataTable({
            "language": {
                        "emptyTable":			"No hay datos disponibles en la tabla.",
                        "info":		   			"Del _START_ al _END_ de _TOTAL_ ",
                        "infoEmpty":			"Mostrando 0 registros de un total de 0.",
                        "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
                        "infoPostFix":			"(actualizados)",
                        "lengthMenu":			"Mostrar _MENU_ registros",
                        "loadingRecords":		"Cargando...",
                        "processing":			"Procesando...",
                        "search":				"Buscar:",
                        "searchPlaceholder":	"Dato a buscar",
                        "zeroRecords":			"No se han encontrado coincidencias.",
                        "paginate": {
                            "first":			"Primera",
                            "last":				"Última",
                            "next":				"Siguiente",
                            "previous":			"Anterior"
                        },
                        "aria": {
                            "sortAscending":	"Ordenación ascendente",
                            "sortDescending":	"Ordenación descendente"
                        }
                    },
                    "lengthMenu":				[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                    "iDisplayLength":			10,
                    "columns" : [
                        {"data": 0},
                        {"data": 1},
                        {"data": 2},
                        {"data": 3},
                        {"data": 4},
                        {"data": 5},
                    ],
                pageLength: 10,

            });

        });
    </script>

    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
        $("#success-alert2").fadeTo(5000, 500).slideUp(500, function(){
            $("#success-alert2").slideUp(500);
        });
    </script>

@endsection
