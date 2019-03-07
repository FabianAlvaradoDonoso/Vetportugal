<li class="">
    <a class="" href="{{url('/clinica')}}">
        <i class="icon_house_alt"></i>
        <span>Inicio</span>
    </a>
</li>


<li class="sub-menu">
    <a class="" href="{{route('client.index')}}">
        <i class="fa fa-user"></i>
        <span>Cliente</span>
    </a>

</li>

<li class="sub-menu">
    <a class="" href={{route('pet.index')}}>
        <i class="fa fa-first-aid"></i>
        <span>Paciente</span>
    </a>

</li>

<li class="sub-menu">
    <a class="" href={{route('control.index')}}>
        <i class="fa fa-calendar-alt"></i>
        <span>Controles</span>
    </a>
</li>

<li class="sub-menu">
    <a class="" href={{route('schedule.index')}}>
        <i class="fa fa-calendar"></i>
        <span>Citas Vacunación</span>
    </a>
</li>

<li class="sub-menu">
    <a class="" href={{route('exampet.index')}}>
        <i class="fas fa-diagnoses"></i>
        <span>Examenes</span>
    </a>
</li>
