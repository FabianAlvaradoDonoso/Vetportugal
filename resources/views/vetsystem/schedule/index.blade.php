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
            <h3 class="page-header"><i class="fa fa-syringe"></i>Citas del Día</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-syringe"></i>Citas del Día</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <a href="{{route('schedule.create')}}" class="btn btn-info btn-block ">Agendar Cita</a>
            </div>
            <div class="col-lg-6">
                <a href="{{route('vaccine.create')}}" class="btn btn-default btn-block">Agregar Vacuna</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <strong>
                            Vacunas de HOY
                        </strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-advance table-hover" id="example1">
                                <thead>
                                <tr>
                                    <th width="15%"><i class="fas fa-user"></i> Tutor</th>
                                    <th width="10%"><i class="fas fa-paw"></i> Paciente</th>
                                    <th width="10%"><i class="fas fa-dog"></i>  <i class="fas fa-cat"></i> Especie</th>
                                    <th width="10%"><i class="fas fa-syringe"></i> Tipo Vacuna</th>
                                    <th width="9%" class="text-center"><i class="far fa-clock"></i> Hora Atención</th>
                                    <th width="10%"><i class="icon_mobile"></i> Contacto</th>
                                    <th width="10%" class="text-center"><i class="icon_cogs"></i> Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pets as $pet)

                                        @if (!$pet->vaccines->isEmpty())
                                            @foreach ($pet->vaccines as $vaccine)
                                                @if ($vaccine->pivot->scheduled_date == date('Y-m-d'))
                                                    <tr class="disabled">
                                                        <td>
                                                            @foreach ($users as $user)
                                                                @if ($user->id == $pet->client_id)
                                                                    {{$user->name}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{$pet->name}}
                                                        </td>
                                                        <td>
                                                            {{$pet->breed->name}}
                                                        </td>
                                                        <td>
                                                            {{$vaccine->name}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{\Carbon\Carbon::createFromFormat('H:i:s',$vaccine->pivot->scheduled_time)->format('H:i')}}
                                                            {{-- @foreach ($pet->vaccines as $vaccine)
                                                                @if ($vaccine->pivot->scheduled_date == date('Y-m-d'))
                                                                    {{$vaccine->pivot->scheduled_date}}
                                                                @endif
                                                            @endforeach --}}
                                                            {{-- {{$vaccine->pivot->scheduled_date}}<br> --}}
                                                        </td>
                                                        <td>
                                                            @foreach ($phones as $phone)
                                                                @if ($phone->id == $pet->client->phone_id)
                                                                    {{$phone->mobile_phone}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <a class="btn btn-success btn-sm" href="{{route('schedule.edit', $vaccine->pivot->id)}}"><i class="fas fa-pen"></i></a>
                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar-{{$vaccine->pivot->id}}"><i class="fas fa-trash"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal modal-danger fade" id="eliminar-{{$vaccine->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar la cita
                                                                    de {{($pet->name)}} a las {{\Carbon\Carbon::createFromFormat('H:i:s',$vaccine->pivot->scheduled_time)->format('H:i')}} el día
                                                                    {{$vaccine->pivot->scheduled_date}}?
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form class="" action="{{route('schedule.destroy', $vaccine->pivot->id)}}" method="post">

                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        @csrf
                                                                        {{method_field('DELETE')}}
                                                                        <button type="submit" class="btn btn-danger">Continuar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <strong>
                            Próximas Vacunas
                        </strong>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-advance table-hover" id="example2">
                                <thead>
                                <tr>
                                    <th width="15%"><i class="fas fa-user"></i> Tutor</th>
                                    <th width="10%"><i class="fas fa-paw"></i> Paciente</th>
                                    <th width="10%"><i class="fas fa-dog"></i>  <i class="fas fa-cat"></i> Especie</th>
                                    <th width="10%"><i class="fas fa-syringe"></i> Tipo Vacuna</th>
                                    <th width="9%"><i class="far fa-calendar-alt"></i> Día Atención</th>
                                    <th width="10%"><i class="icon_mobile"></i> Contacto</th>
                                    <th width="10%" class="text-center"><i class="icon_cogs"></i> Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pets as $pet)

                                        @if (!$pet->vaccines->isEmpty())
                                            @foreach ($pet->vaccines as $vaccine)
                                                @if ($vaccine->pivot->scheduled_date > date('Y-m-d'))
                                                    <tr>
                                                        <td>
                                                            @foreach ($users as $user)
                                                                @if ($user->id == $pet->client_id)
                                                                    {{$user->name}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{$pet->name}}
                                                        </td>
                                                        <td>
                                                            {{$pet->breed->name}}
                                                        </td>
                                                        <td>
                                                            {{$vaccine->name}}
                                                        </td>
                                                        <td>
                                                            {{date('d-m-Y', strtotime($vaccine->pivot->scheduled_date))}}
                                                        </td>
                                                        <td>
                                                            @foreach ($phones as $phone)
                                                                @if ($phone->id == $pet->client->phone_id)
                                                                    {{$phone->mobile_phone}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <a class="btn btn-success btn-sm" href="{{route('schedule.edit', $vaccine->pivot->id)}}"><i class="fas fa-pen"></i></a>
                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar-{{$vaccine->pivot->id}}"><i class="fas fa-trash"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal modal-danger fade" id="eliminar-{{$vaccine->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar la cita
                                                                    de {{($pet->name)}} a las {{\Carbon\Carbon::createFromFormat('H:i:s',$vaccine->pivot->scheduled_time)->format('H:i')}} el día
                                                                    {{$vaccine->pivot->scheduled_date}}?
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form class="" action="{{route('schedule.destroy', $vaccine->pivot->id)}}" method="post">

                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        @csrf
                                                                        {{method_field('DELETE')}}
                                                                        <button type="submit" class="btn btn-danger">Continuar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
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
                        {"data": 6}
                    ],
                pageLength: 10,

            });

        });
        $(document).ready(function(){
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
                        {"data": 6}
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
