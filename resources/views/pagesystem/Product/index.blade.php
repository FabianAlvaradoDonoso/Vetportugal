@extends('pagesystem/layouts.app2')
{{-- --------------------------------------------------------------------- --}}

@section('name')
    <title>Productos - AutoAdmin</title>
@endsection

{{-- --------------------------------------------------------------------- --}}


{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <section class="content-header">
        <h1>
            Productos
            <small>Listado</small>
            <a href="{{route('Product.create')}}" class="btn btn-primary btn-sm">Nuevo Productos</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><a href="#">Productos</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Productos</h3>
            </div>
            <div class="box-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                        {{$message}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th style="width: 20%">Nombre</th>
                                <th style="width: 10%">resumen</th>
                                <th style="width: 40%">Descripción</th>
                                <th style="width: 10%" class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->resumen}}</td>
                                            <td>{{$product->description}}</td>
                                            <td class="text-center">
                                            <p><a class="btn btn-success btn-sm btn-learn" href="{{route('Product.edit', $product->slug)}}">Editar</a></p>
                                                {!! Form::open([ 'route' => ['Product.destroy', $product->slug], 'method'=>'DELETE'])!!}
                                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm mb-2'])!!}
                                                    
                                                {!! Form::close()!!}
                                            </td>
                                        </tr>

                                        <div class="modal modal-danger fade" id="smallmodal-{{$product->slug}}" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Confirmación</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                            <strong> Si presiona continuar los datos no podrán ser recuperados.</strong><br> ¿Esta seguro que desea eliminar {{($product->name)}}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form class="" action="{{route('Product.destroy', $product->slug)}}" method="post">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            @csrf
                                                            {{method_field('DELETE')}}
                                                            <button type="submit" class="btn btn-danger">Continuar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('scripts')
    <script>
        jQuery("#alert").fadeTo(2000, 500).slideUp(500, function(){
            jQuery("#alert").slideUp(500);
        });
    </script>
    <script>
        $(function () {
            // $('#example2').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                "language"    : {
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

            })
        })
    </script>
@endsection
