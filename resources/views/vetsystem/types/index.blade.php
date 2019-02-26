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
            <h3 class="page-header"><i class="fa fa-paw"></i> Especies</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-paw"></i>Especies</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <a href="{{route('type.create')}}" class="btn btn-info btn-block">Agregar Especie</a>
            </div>
            <div class="col-lg-6">
                <a href="{{route('breed.index')}}" class="btn btn-default btn-block">Razas</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <strong>
                            Listados de Especies
                        </strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="example1">
                                <thead>
                                    <tr>
                                        <th style=""><i class="fa fa-paw"></i> Nombre</th>
                                        <th style="" class="text-center"><i class="fas fa-cog"></i> Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $type)
                                    <tr>
                                        <td>{{$type->name}}</td>
                                        <td class="text-center">
                                            <a href="{{route('type.edit', $type->id)}}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_type-{{$type->id}}"><i class="fas fa-trash"></i>
                                            {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modificar_type-{{$type->id}}"><i class="fas fa-pen"></i> --}}
                                        </td>
                                    </tr>


                                    {{-- MODALS --}}

                                    <div class="modal modal-danger fade" id="eliminar_type-{{$type->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar {{($type->name)}}?
                                                </div>
                                                <div class="modal-footer">

                                                    <form class="" action="{{route('type.destroy', $type->id)}}" method="post">

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
