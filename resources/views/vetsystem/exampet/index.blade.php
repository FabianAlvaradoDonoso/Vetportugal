@extends('vetsystem.layout.master')

@section('content')
    <section class="wrapper">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" id="success-alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><i class="icon fa fa-check"></i>
                {{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fas fa-diagnoses"></i> Examenes de Pacientes</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fas fa-diagnoses"></i>Examenes</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('exampet.create')}}" class="btn btn-info btn-block">Agregar Examen</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <strong>
                            Listados de Examenes
                        </strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table tableV table-striped table-hover table-bordered"  id="example2">
                                <thead>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Muestras Retiradas</th>
                                        <th>Resultados Recibidos</th>
                                        <th>Resultados Entregados</th>
                                        <th>Hora Agendada</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($examspets as $exampet)
                                        <tr>
                                            <td>{{$exampet->pet->name}}</td>
                                            @if ($exampet->status == 'HA')
                                                <td class="text-center"><i class="fas fa-check"></i></td>
                                                <td class="text-center"><i class="fas fa-check"></i></td>
                                                <td class="text-center"><i class="fas fa-check"></i></td>
                                                <td class="text-center"><i class="fas fa-check"></i></td>
                                            @else
                                                @if ($exampet->status == 'RE')
                                                    <td class="text-center"><i class="fas fa-check"></i></td>
                                                    <td class="text-center"><i class="fas fa-check"></i></td>
                                                    <td class="text-center"><i class="fas fa-check"></i></td>
                                                    <td class="text-center"></td>

                                                @else
                                                    @if ($exampet->status == 'RR')
                                                        <td class="text-center"><i class="fas fa-check"></i></td>
                                                        <td class="text-center"><i class="fas fa-check"></i></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    @else
                                                        <td class="text-center"><i class="fas fa-check"></i></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    @endif
                                                @endif
                                            @endif
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('exampet.moveleft', $exampet->id)}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i></a>
                                                    <a href="{{route('exampet.moveright', $exampet->id)}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-right"></i></a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mostrar_exam-{{$exampet->id}}"><i class="fas fa-eye"></i></button>
                                                    <a href="{{route('exampet.edit', $exampet->id)}}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_exam-{{$exampet->id}}"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal modal-info fade" id="mostrar_exam-{{$exampet->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <strong> Paciente:</strong> {{($exampet->pet->name)}} <br>
                                                        <strong> Examen:</strong> {{($exampet->exam->name)}} <br>
                                                        <strong> Vista:</strong> {{($exampet->views)}} <br>
                                                        @if ($exampet->status == 'MR')
                                                            <strong> Estado: </strong>Muestra Recibida<br>
                                                        @else
                                                            @if ($exampet->status == 'RR')
                                                                <strong> Estado: </strong>Resultados Recibidos<br>
                                                            @else
                                                                @if ($exampet->status == 'RE')
                                                                    <strong> Estado: </strong>Resultados Entregados<br>
                                                                @else
                                                                    <strong> Estado: </strong>Hora Agendada<br>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{route('exampet.edit', $exampet->id)}}" class="btn btn-sm btn-success">Editar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-danger fade" id="eliminar_exam-{{$exampet->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar {{($exampet->name)}}?
                                                    </div>
                                                    <div class="modal-footer">

                                                        <form class="" action="{{route('exampet.destroy', $exampet->id)}}" method="post">

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
                    ],
                pageLength: 10,

            });
            $('#example2').DataTable({
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
    </script>

@endsection
