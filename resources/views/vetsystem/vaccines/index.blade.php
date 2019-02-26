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
            <h3 class="page-header"><i class="fa fa-syringe"></i> Vacunas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-syringe"></i>Vacunas</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <strong>
                            Vacunas
                        </strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="">
                                <thead>
                                    <tr>
                                        <th style=""><i class="fas fa-syringe"></i> Nombre</th>
                                        <th style="" class="text-center"><i class="fas fa-cog"></i> Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vaccines as $vaccine)
                                    <tr>
                                        <td>{{$vaccine->name}}</td>
                                        <td class="text-center">
                                            <a href="{{route('vaccine.edit', $vaccine->id)}}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_vaccine-{{$vaccine->id}}"><i class="fas fa-trash"></i>
                                            {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modificar_vaccine-{{$vaccine->id}}"><i class="fas fa-pen"></i> --}}
                                        </td>
                                    </tr>


                                    {{-- MODALS --}}

                                    <div class="modal modal-danger fade" id="eliminar_vaccine-{{$vaccine->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar {{($vaccine->name)}}?
                                                </div>
                                                <div class="modal-footer">

                                                    <form class="" action="{{route('vaccine.destroy', $vaccine->id)}}" method="post">

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
                    <a href="{{route('vaccine.create')}}" class="btn btn-info">Nuevo</a>
                    <a href="{{url('schedule')}}" class="btn btn-info">Calendario</a>
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
                        {"data": 5}
                    ],
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Recintos_Deportivos'},
                    {extend: 'pdf', title: 'Recintos_Deportivos'},

                    {
                        extend: 'print',
                        customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>


    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    </script>

@endsection
