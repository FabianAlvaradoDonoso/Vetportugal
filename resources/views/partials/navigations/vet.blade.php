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
        <i class="fa fa-calendar"></i>
        <span>Citas Vacunación</span>
    </a>
</li>
