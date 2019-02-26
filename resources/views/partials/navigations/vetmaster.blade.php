{{-- <li class="active">
    <a class="" href="index.html">
        <i class="icon_house_alt"></i>
        <span>Inicio</span>
    </a>
</li>

<!-- CLIENTES -->

<li class="sub-menu">
    <a class="" href="{{route('client.index')}}">
        <i class="fa fa-user"></i>
        <span>Cliente</span>
    </a>

</li>
<li>
    <a class="" href="vacunas.html">
        <i class="fas fa-syringe"></i>
        <span>Vacunas</span>
    </a>
</li>
<li>
    <a class="" href="pacientes.html">
        <i class="fas fa-paw"></i>
        <span>Pacientes</span>
    </a>
</li> --}}
<li class="">
    <a class="" href="{{url('/home')}}">
        <i class="icon_house_alt"></i>
        <span>Inicio</span>
    </a>
</li>

<!-- CLIENTES -->

<li class="sub-menu">
    <a class="" href="{{route('client.index')}}">
        <i class="fa fa-user"></i>
        <span>Cliente</span>
    </a>

</li>



<!-- pacientes -->

<li class="sub-menu">
    <a class="" href={{route('pet.index')}}>
        <i class="fa fa-first-aid"></i>
        <span>Paciente</span>
    </a>

</li>

<!-- Personal -->

<li class="sub-menu">
    <a class="" href={{route('schedule.index')}}>
        <i class="fas fa-syringe"></i>
        <span>Citas Vacunación</span>
    </a>
</li>
<li class="sub-menu">
    <a class="" href={{route('control.index')}}>
        <i class="fa fa-calendar-alt"></i>
        <span>Controles</span>
    </a>
</li>
<li class="sub-menu">
    <a class="" href={{route('exampet.index')}}>
        <i class="fas fa-diagnoses"></i>
        <span>Examenes</span>
    </a>
</li>

<li class="sub-menu">
    <a href="javascript:;" class="">
        <i class="icon_document_alt"></i>
        <span>Opciones</span>
        <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
        <li><a class="" href="{{route('breed.index')}}">Razas</a></li>
        <li><a class="" href="{{route('type.index')}}">Especies</a></li>
        <li><a class="" href="{{route('vaccine.index')}}">Vacunas</a></li>
        <li><a class="" href="{{route('vet.index')}}">Veterinarios</a></li>
        <li><a class="" href="{{route('specialty.index')}}">Especialidades</a></li>
        <li><a class="" href="{{route('exam.index')}}">Tipos Examen</a></li>
    </ul>
</li>
