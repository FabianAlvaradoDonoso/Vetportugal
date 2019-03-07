@extends('vetsystem.layout.master')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <style>
        td.details-control {
            background: url("/image/details_open.png") no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url("/image/details_close.png") no-repeat center center;
        }
    </style>



@endpush

@section('content')

    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user"></i> Cliente <tab><a class="btn btn-primary "  href="{{route('client.create')}}" ><span class="fas fa-plus"></span>  Agregar</a></tab></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{route('clinica')}}">Inicio</a></li>
                    <li><i class="fa fa-user"></i>Cliente</li>
                </ol>
            </div>
        </div>

        <div class="row" >
            <div class="col-lg-12 col-md-12" >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2><strong>Panel de clientes </strong> </h2>

                        <div class="panel-actions">
                            <a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                            <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                        </div>
                    </div>

                    <div class="panel-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i>
                                    {{ $message }}</p>
                            </div>
                            <br>
                        @endif
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-user"></i>{{__("  Nombre")}}</th>
                                        <th><i class="fas fa-paw"></i>{{__("Mascotas")}}</th>
                                        <th><i class="fas fa-list"></i>{{__(" Correo")}}</th>
                                        <th><i class="fas fa-phone"></i>{{__(" Télefono Celular")}}</th>
                                        <th><i class="fas fa-map-signs"></i>{{__(" Dirección")}}</th>
                                        <th width="10%" class="text-center"><i class="icon_cogs"></i> Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($clients as $key => $value)
                                    @if($value->user && $value->user->role_id == 3)
                                    <tr>
                                        <td>{{ $value->user->name. " " . $value->user->last_name }}</td>


                                        <td><center>{{ $value->pets_count }}</center></td>

                                        <td>{{ $value->user->email }}</td>


                                        @if($value->phone)
                                            <td>{{ $value->phone->mobile_phone }}</td>
                                        @else
                                            <td>Sin información</td>
                                        @endif

                                        @if($value->address)
                                            <td>{{ $value->address->street. " " . $value->address->numeration.", " . $value->address->commune->name. ", ". $value->address->city->name}}</td>

                                        @else
                                            <td>Sin información</td>
                                        @endif


                                        <td width="15%">

                                            <div class="btn-group ">

                                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ver-detalle-{{$value->id}}"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-warning btn-sm" href="{{route('client.edit',$value->id)}}"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ver-mascota-{{$value->id}}"><i class="fas fa-paw"></i></a>
                                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar-cliente-{{$value->id}}"><i class="fas fa-trash"></i></a>

                                            </div>

                                            <!-- Button trigger modal -->

                                        </td>
                                    </tr>



                                    <!-- Modal DETALLE-->

                                    <div class="modal modal-info fade" id="ver-detalle-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i>&nbsp {{$value->user->name. " " . $value->user->last_name}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Fecha de ingreso:</strong> {{$value->created_at}}<br><br>

                                                    <strong>Número de mascotas:</strong> {{$value->pets_count}}<br><br>

                                                    <strong>Correo:</strong> {{$value->user->email}}<br><br>

                                                    <strong>Teléfono fijo: </strong>

                                                        @if($value->phone) {{ $value->phone->landline}}

                                                        @else  Sin información

                                                        @endif

                                                    <br>
                                                    <br>

                                                    <strong>Teléfono Celular:</strong>

                                                        @if($value->phone) {{ $value->phone->mobile_phone}}

                                                        @else Sin información

                                                        @endif

                                                    <br>
                                                    <br>


                                                    <strong>Dirección:</strong>

                                                        @if($value->address)

                                                            {{ $value->address->street. " " . $value->address->numeration.", " . $value->address->commune->name. ", ". $value->address->city->name}}
                                                        @else

                                                            Sin información

                                                        @endif

                                                    <br>
                                                    <br>

                                                    <strong>Cantidad de atenciones: </strong> {{$value->visit}}<br><br>

                                                    <strong>Foto de perfil:</strong>
                                                        <center>
                                                        <img
                                                            class="card-img-top"

                                                            src="{{ $value->user->pathAttachment() }}"
                                                            alt="{{$value->user->name. " " . $value->user->last_name}}"
                                                            width="200"
                                                            height="200"
                                                        />
                                                        </center>


                                                </div>
                                                <div class="modal-footer">

                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal Mascotas-->

                                    <div class="modal modal-info fade" id="ver-mascota-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-paw"></i>&nbsp {{$value->user->name. " " . $value->user->last_name}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $no=1; ?>
                                                        @if($value->pets_count!=0)

                                                            @foreach($value->pets as $key => $mascota)

                                                                    <strong>Mascota N°{{$no++}}</strong><br><br>

                                                                    <strong>Nombre: </strong> {{$mascota->name}}<br><br>

                                                                    <strong>Sexo:</strong> {{$mascota->gender->name}}<br><br>

                                                                    <strong>Foto de perfil:</strong>
                                                                    <center>
                                                                        <img
                                                                            class="card-img-top"
                                                                            src="{{$mascota->pathAttachment() }}"
                                                                            alt="{{$mascota->name}}"
                                                                            width="200"
                                                                            height="200"
                                                                        />
                                                                    </center>
                                                                <hr>

                                                            @endforeach

                                                        @else
                                                            <strong>Ups! Aún no tiene mascotas asociadas</strong>
                                                        @endif





                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal ELIMINAR-->
                                    <div class="modal modal-danger fade" id="eliminar-cliente-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i>&nbspAdvertencia</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar a {{$value->user->name. " " . $value->user->last_name}}?
                                                </div>
                                                <div class="modal-footer">

                                                    <form class="" action="{{route('client.destroy',$value->id)}}" method="post">

                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-primary"  onclick="javascript:this.form.submit();this.disabled= true;">Continuar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                                </tbody>

                            </table>


                            <div>
                                Seleccionar columnas:
                                <a class="toggle-vis btn btn-success btnToggle" data-column="1">Nombre</a> -
                                <a class="toggle-vis btnToggle btn btn-success" data-column="2">Mascotas</a> -
                                <a class="toggle-vis btnToggle btn btn-success" data-column="3">Correo</a> -
                                <a class="toggle-vis btnToggle btn btn-success" data-column="4">Contacto</a> -
                                <a class="toggle-vis btnToggle btn btn-success" data-column="5">Comuna</a> -
                                <a class="toggle-vis btnToggle btn btn-success" data-column="6">Acciones</a>
                            </div>
                            <br>

                            <table
                                class="table table-hover table-bordered table-responsive"
                                style="width:100%"
                                id="client-table"
                            >
                                <thead>
                                <tr>
                                    <th></th>
                                    <th><i class="fas fa-user"></i>{{ __(" Nombre") }}</th>
                                    <th><i class="fas fa-paw"></i>{{ __("  Mascotas") }}</th>
                                    <th><i class="fas fa-list"></i>{{ __(" Correo") }}</th>
                                    <th><i class="fas fa-address-book"></i>{{ __(" Contacto") }}</th>
                                    <th><i class="fas fa-map-signs"></i>{{ __(" Comuna") }}</th>
                                    <th><i class="fas fa-gears"></i>{{ __(" Acciones") }}</th>
                                </tr>
                                </thead>

                                <tfoot >
                                <tr>
                                    <th></th>
                                    <th><i class="fas fa-user"></i>{{ __(" Nombre") }}</th>
                                    <th><i class="fas fa-paw"></i>{{ __(" Mascotas") }}</th>
                                    <th><i class="fas fa-list"></i>{{ __(" Correo") }}</th>
                                    <th><i class="fas fa-address-book"></i>{{ __(" Contacto") }}</th>
                                    <th><i class="fas fa-map-signs"></i>{{ __(" Comuna") }}</th>
                                    <th><i class="fas fa-gears"></i>{{ __(" Acciones") }}</th>
                                </tr>
                                </tfoot>
                            </table>
                            @include('partials.modal')


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Botones para Datatable -->
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script>
        let modal = jQuery("#appModal");
        $(document).ready(function() {
            var table = $('#client-table').DataTable( {     //Para configurar DataTable
                pageLength: 10,     //Número de registros que se muestran por defecto
                lengthMenu: [ 10, 25, 50, 75, 100 ],        //Opciones para cantidad de registros a mostrar
                processing: true,           //Mensaje que se muestra al estar procesando alguna petición (busquedas, ordenar,etc)

                ajax: '{{ route('client.detail') }}',           //Ruta de donde obtiene los datos que se muestran en la tabla
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"      //Traducción de la tabla
                },
                columns: [
                    {                                                   //Columna desplegable
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    {data: 'nombre'},               //campos obtenidos en el json (obtenidos en el metodo llamado por ajax)
                    {data: 'pets_count'},
                    {data: 'user.email'},
                    {data: 'phone.mobile_phone'},
                    {data: 'address.commune.name'},
                    {data: 'actions'}
                ],
                responsive: true,
                //dom: 'Bfrtip',            //Problemas con los botones, se muestran, pero se sobreponen a lenghtMenu
                //buttons: [
                //    'copy', 'excel', 'pdf', 'print'
                //],

                "footerCallback": function ( row, data, start, end, display ) {     //Función que permite agregar al footer el total de mascotas
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?      //Transforma string a int , además de limpiarlo (quitar simbolos $, si hubiese)
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 2 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 2, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 2).footer() ).html(
                    '<i class="fas fa-paw"></i>'+
                        ' Total Mascotas: '+ total
                    );
                }

            } );

            jQuery(document).on("click", '.btnDetail', function (e) {           //Funcion para llamar y llenar dinamicamente un modal, en este caso para ver detalles
                e.preventDefault();

                const id = jQuery(this).data('id');

                var tr = $(this).closest('tr');         //Obtención de los valores del JSON
                var row = table.row( tr );

                modal.find('.modal-title').text('{{ __("Detalle del Cliente") }}');

                let $form = $("<div id='client-detail'></div>");    //Div para rellenar
                $form.append(`<strong>Nombre:</strong> ` + row.data().nombre + '<br><br>');     //Todas estas sentencias quedan dentro del div de arriba
                $form.append(`<strong>Correo:</strong> ` + row.data().user.email + '<br><br>');
                $form.append(`<strong>Telefono móvil:</strong> ` + row.data().phone.mobile_phone + '<br><br>');
                $form.append(`<strong>Telefono fijo:</strong> ` + row.data().phone.landline + '<br><br>');
                $form.append(`<strong>Dirección:</strong> ` + row.data().address.street + ' '+ row.data().address.numeration +' '+ row.data().address.commune.name + '<br><br>');

                let $form1 = $("<div id='client-photo'></div>");
                $form1.append(row.data().image + '<br><br>');
                modal.find('.seccion1').html($form);        //Agregar html a la parte del modal que tiene como clase ".seccion1"
                modal.find('.seccion2').html($form1);

                modal.find('#modalAction').hide();      //Para esconder boton



                modal.modal();
            });

            jQuery(document).ready(function() {     //Función para intercambiar el color de los botones para eliminar y agregar columnas en la tabla

                jQuery(document).on("click", '.btnToggle', function (e) {
                    e.preventDefault();
                    $(this).toggleClass("btn-default btn-success");

                });


            });

            // Evento para abrir y cerrar los detalles de la tabla (columna 0)

            $('#client-table tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );


            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );


                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        } );

        /* Función para dar formato a los detalles de la tabla (columna 0) */
        function format ( d ) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                '<td>Total atenciones:</td>'+
                '<td>'+d.visit+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Fecha Ingreso:</td>'+
                '<td>'+ d.created_at +'</td>'+
                '</tr>'+
                '</table>';
        }

    </script>
@endpush


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
    </script>

@endsection
