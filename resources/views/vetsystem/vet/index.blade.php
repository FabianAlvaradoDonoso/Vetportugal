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
            <h3 class="page-header"><i class="fa fa-paw"></i> Veterinarios</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-paw"></i>Veterinarios</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('vet.create')}}" class="btn btn-info btn-block">Agregar Veterinario</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <strong>
                            Listados de Veterinarios
                        </strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="example1">
                                <thead>
                                    <tr>
                                        <th style=""><i class="fa fa-paw"></i> Nombre</th>
                                        <th style=""><i class="fa fa-paw"></i> RUT</th>
                                        <th style=""><i class="fa fa-paw"></i> Telefono</th>
                                        <th style="" class="text-center"><i class="fas fa-cog"></i> Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vets as $vet)
                                    <tr>
                                        <td>{{$vet->user->name}} {{$vet->user->last_name}}</td>
                                        <td>{{number_format($vet->rut, 0, ',', '.')}}-X</td>
                                        <td>{{$vet->phone->mobile_phone}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#mostrar-{{$vet->id}}"><i class="fas fa-eye"></i></button>
                                                <a href="{{route('vet.edit', $vet->id)}}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_vet-{{$vet->id}}"><i class="fas fa-trash"></i>
                                                {{-- <button vet="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modificar_vet-{{$vet->id}}"><i class="fas fa-pen"></i> --}}
                                            </div>
                                        </td>
                                    </tr>


                                    {{-- MODALS --}}

                                    <div class="modal modal-info fade" id="mostrar-{{$vet->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i>&nbspControl</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Nombre:</strong> {{$vet->user->name}} {{$vet->user->last_name}}<br><br>
                                                    <strong>Rut:</strong> {{number_format($vet->rut, 0, ',', '.')}}-X<br><br>
                                                    <strong>Teléfono:</strong> {{$vet->phone->mobile_phone}}<br><br>
                                                    <strong>Email:</strong> {{$vet->user->email}}<br><br>
                                                    <strong>Especialidades:</strong>
                                                    @foreach ($vet->specialties as $specialty)
                                                        @if ($specialty === end($vet->specialties))
                                                            <br>{{$specialty->name}}
                                                        @else
                                                            <br>-{{$specialty->name}}
                                                        @endif
                                                    @endforeach
                                                    <br><br>

                                                </div>
                                                <div class="modal-footer">

                                                    <form class="" action="{{route('control.destroy', $vet->id)}}" method="post">
                                                        <a href="{{route('control.edit', $vet->id)}}" class="btn btn-success">Editar</a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger">Continuar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal modal-danger fade" id="eliminar_vet-{{$vet->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar {{($vet->name)}}?
                                                </div>
                                                <div class="modal-footer">

                                                    <form class="" action="{{route('vet.destroy', $vet->id)}}" method="post">

                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger">Continuar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- END MODALS --}}
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
