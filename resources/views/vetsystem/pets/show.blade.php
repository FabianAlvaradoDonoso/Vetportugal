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
            <h3 class="page-header"><i class="fas fa-paw"></i> Mascota</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
                <li><i class="fas fa-paw"></i> Mascota</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <!-- profile-widget -->
            <div class="col-lg-12">
                <div class="profile-widget profile-widget-info">
                    <div class="panel-body">
                        <div class="col-lg-2 col-sm-2">
                            <h4>{{$pet->name}}</h4>
                            <div class="follow-ava">
                                <img src="{{asset('img/dog.jpg')}}" alt="">
                            </div>
                            <h6>{{$pet->breed->name}} - {{$pet->gender->name}}</h6>
                        </div>
                        <div class="col-lg-4 col-sm-4 follow-info">
                            <p><i class="fa fa-user"></i><a href="  " style="text-decoration: none; color: white">Tutor : {{$pet->client->user->name}}</a></p>
                            <p><i class="fas fa-microchip"></i> Chip : {{$pet->id}}</p>
                            <p><i class="fas fa-birthday-cake"></i> Nacimiento : {{date('d-m-Y', strtotime($pet->birthdate))}}</p>
                            <h6>
                                <span><i class="icon_clock_alt"></i>Creación Perfil: {{date('d-m-Y', strtotime($pet->created_at))}}</span>
                            </h6>
                        </div>
                        <div class="col-lg-2 col-sm-6 follow-info weather-category" style="height: ">
                            <ul>
                                <li class="active">
                                    <span><i class="far fa-calendar-alt fa-2x"></i><br>Edad:
                                        @if (\Carbon\Carbon::parse($pet->birthdate)->month <= 1 )
                                            {{\Carbon\Carbon::parse($pet->birthdate)->age}} Años y {{\Carbon\Carbon::parse($pet->birthdate)->month}} Mes.
                                        @else
                                            {{\Carbon\Carbon::parse($pet->birthdate)->age}} Años y {{\Carbon\Carbon::parse($pet->birthdate)->month}} Meses.
                                        @endif
                                    </span>
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm-6 follow-info weather-category">
                            <ul>
                                <li class="active">

                                {{-- <i class="fa fa-comments fa-2x"> </i><br> Ultimo control el día: {{date('d-m-Y', strtotime($pet->vets->last()->pivot->date))}} --}}
                                <i class="fa fa-comments fa-2x"> </i><br> Ultimo control:
                                    @if ($pet->vets->last())
                                        {{date('d-m-Y', strtotime($pet->vets->last()->pivot->date))}}
                                    @else
                                        Sin controles ingresados.
                                    @endif
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm-6 follow-info weather-category">
                            <ul>
                                <li class="active">

                                <i class="fa fa-comments fa-2x"> </i><br> Contrary to popular belief, Lorem Ipsum is not simply
                                </li>

                            </ul>
                        </div>
                        <div class="btn-group col-lg-10 col-sm-10" style="width: 100%">
                            <div class="btn-group" style="width: 20%;">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-block" type="button">Generar <span class="caret"></span> </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Certificado Salud</a></li>
                                    <li><a href="#">Ficha Control</a></li>
                                    <li><a href="#">Alta Voluntaria</a></li>
                                    <li><a href="#">Autorización Eutanasia</a></li>
                                </ul>
                            </div>
                            <div class="btn-group" style="width: 20%;">
                                <button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-block" type="button">Nuevo <span class="caret"></span> </button>
                                <ul class="dropdown-menu">
                                <li><a href="{{route('control.create2', $pet->id)}}">Consulta</a></li>
                                <li><a href="#">Procedimiento</a></li>
                                <li><a href="#">Exámen</a></li>
                                <li><a href="#">Hospitalización</a></li>
                                </ul>
                            </div>
                            {{-- <div class="btn-group" style="width: 20%;">
                                <button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-block" type="button">Alerta <span class="caret"></span> </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Por Consulta</a></li>
                                    <li><a href="#">Por Procedimiento</a></li>
                                    <li><a href="#">Por Exámen</a></li>
                                    <li><a href="#">Por Comida</a></li>
                                </ul>
                            </div> --}}
                            <a class="btn btn-success" style="width: 20%;" href="#">Modificar</a>
                            <a class="btn btn-danger" style="width: 20%;" href="#">Eliminar</a>
                            <a class="btn btn-warning" style="width: 20%;" href="{{route('pet.index')}}">Volver</a>
                        </div>
                        {{-- <div class="btn-group btn-group-justified">
                            <a class="btn btn-primary" href="#">Left</a>
                            <a class="btn btn-success" href="#">Left</a>
                            <a class="btn btn-success" href="#">Nuevo</a>
                            <a class="btn btn-info" href="#">Middle</a>
                            <a class="btn btn-warning" href="#">Middle</a>
                            <a class="btn btn-danger" href="#">Right</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-info">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#Perfil">
                                    <i class="fas fa-paw"></i>
                                    Perfil
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tutor">
                                    <i class="far fa-user"></i>
                                    Tutor
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#recent-activity">
                                    <i class="far fa-calendar-check"></i>
                                    Actividades
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#hospitaly">
                                    <i class="fas fa-hospital-symbol"></i>
                                    Evolución Hospitalaria
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <!-- Perfil -->
                            <div id="Perfil" class="tab-pane active">
                                <section class="panel">
                                    <div class="bio-graph-heading">
                                        Hola, soy una descripcion de una mascota, aqui pueden poner cualquier cosa que los clientes quieran para personalizar un poco el perfil de sus mascotas. Enjoy!
                                    </div>
                                    <div class="panel-body bio-graph-info">
                                        <h1>Perfil Mascota</h1>
                                        <div class="row">
                                            <div class="bio-row">
                                                <p><span>Nombre </span>: {{$pet->name}} </p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Raza </span>: {{$pet->breed->name}}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Nacimiento</span>: {{date('d-m-Y', strtotime($pet->birthdate))}}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Especie </span>: {{$pet->breed->type->name}}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Color </span>: {{$pet->color}}</p>
                                            </div>
                                            <div class="bio-row">
                                                @if ($pet->castration_date != NULL)
                                                    <p><span>Castración </span>: {{date('d-m-Y', strtotime($pet->castration_date))}}</p>
                                                @else
                                                    <p><span>Castración </span>: No Aplica</p>
                                                @endif
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Peso </span>: {{$pet->weight}}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Genero </span>: {{$pet->gender->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                    </div>
                                </section>
                            </div>
                            <!-- tutor -->
                            <div id="tutor" class="tab-pane">
                                    <section class="panel">
                                        {{-- <div class="bio-graph-heading">
                                            Hola, soy una descripcion de una mascota, aqui pueden poner cualquier cosa que los clientes quieran para personalizar un poco el perfil de sus mascotas. Enjoy!
                                        </div> --}}
                                        <div class="panel-body bio-graph-info">
                                            <h1>Perfil Tutor</h1>
                                            <div class="row">
                                                <div class="bio-row">
                                                    <p><span>Nombre </span>: {{$pet->client->user->name}} </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Apellido </span>: {{$pet->client->user->last_name}}</p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Email</span>: {{$pet->client->user->email}}</p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Dirección </span>: {{$pet->client->address->street}} {{$pet->client->address->numeration}}</p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Comuna </span>: {{$pet->client->address->commune->name}}</p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Ciudad </span>: {{$pet->client->address->city->name}}</p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Telefono Fijo </span>: {{$pet->client->phone->landline}}</p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Telefono Movil </span>: {{$pet->client->phone->mobile_phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                        </div>
                                    </section>
                            </div>
                            <!-- Activity -->
                            <div id="recent-activity" class="tab-pane">
                                <div class="row">
                                    <br>
                                    <div class="col-lg-6">
                                        <!--notification start-->
                                        <section class="panel" id="Controles">
                                            <header class="panel-heading">
                                                Controles
                                            </header>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover" id="example1">
                                                        <thead>
                                                            <tr>
                                                                <th>Veterinario</th>
                                                                <th>Fecha</th>
                                                                <th>Sintoma</th>
                                                                <th class="text-center">Detalle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pet->vets as $vet)
                                                                <tr>
                                                                    <td>{{$vet->user->name}}</td>
                                                                    <td>{{$vet->pivot->date}}</td>
                                                                    <td>{{$vet->pivot->symptom}}</td>
                                                                    <td class="text-center">
                                                                        <a href="" class="btn btn-sm btn-warning"><i class="far fa-eye"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="panel" id="Desparacitaciones">
                                            <header class="panel-heading">
                                                Desparacitaciones
                                            </header>
                                            <div class="panel-body">

                                            </div>
                                        </section>

                                    </div>
                                    <div class="col-lg-6">
                                        <section class="panel" id="Vacunas">
                                            <header class="panel-heading">
                                                Vacunas
                                            </header>
                                            <div class="panel-body">
                                                {{-- @foreach ($pet->vaccines as $vaccine)
                                                    <div class="act-time">
                                                        <div class="activity-body act-in">
                                                            <span class="arrow"></span>
                                                            <div class="text">
                                                                <p class="attribution"><b>{{$vaccine->name}}</b> aplicada por DR XXX</p>
                                                                <p>A las {{$vaccine->pivot->scheduled_time}}, {{\Carbon\Carbon::parse($vaccine->pivot->scheduled_date)->formatLocalized('%d %B %Y')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach --}}

                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover" id="example1">
                                                        <thead>
                                                            <tr>
                                                                <th>Tipo Vacuna </th>
                                                                <th>Hora</th>
                                                                <th>Fecha</th>
                                                                <th>Veterinario</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pet->vaccines as $vaccine)
                                                                <tr>
                                                                    <td>{{$vaccine->name}}</td>
                                                                    <td>{{$vaccine->pivot->scheduled_time}}</td>
                                                                    <td>{{$vaccine->pivot->scheduled_date}}</td>
                                                                    <td>Arreglar BD para agregar vet en vaccines</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="panel" id="Examenes">
                                            <header class="panel-heading">
                                                Examenes
                                            </header>
                                            <div class="panel-body">

                                            </div>
                                        </section>

                                    </div>

                                </div>
                            </div>
                            <div id="hospitaly" class="tab-pane">
                                <div class="row">
                                    <br>
                                    <div class="col-lg-6">
                                        <!--notification start-->
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Controles
                                            </header>
                                            <div class="panel-body">

                                            </div>
                                        </section>
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Desparacitaciones
                                            </header>
                                            <div class="panel-body">

                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-6">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Vacunas
                                            </header>
                                            <div class="panel-body">

                                            </div>
                                        </section>
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Examenes
                                            </header>
                                            <div class="panel-body">

                                            </div>
                                        </section>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
        $("#success-alert2").fadeTo(5000, 500).slideUp(500, function(){
            $("#success-alert2").slideUp(500);
        });
    </script>

@endsection

