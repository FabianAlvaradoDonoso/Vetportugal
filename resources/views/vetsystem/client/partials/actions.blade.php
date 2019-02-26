
<!-- Ver Detalle cliente -->
<a
    href="#"
    data-target="#appModal"
    title="{{__('Ver cliente')}}"
    data-id="{{$user['id']}}"
    class="btn btn-info btn-sm btnDetail"
>
    <i class="fas fa-eye"></i>

</a>

<!-- Editar cliente -->


<a
    class="btn btn-warning btn-sm"
    href="{{route('client.edit',$user['id'])}}"
>
    <i class="fas fa-edit"></i>

</a>

<!-- Ver mascotas -->

<a
    href="#"
    data-target="#appModal"
    title="{{__('Ver mascotas')}}"
    data-id="{{$user['id']}}"
    class="btn btn-success btn-sm btnPet"
>
    <i class="fas fa-paw"></i>

</a>

<!-- Eliminar cliente -->


<a

    class="btn btn-danger btn-sm"
    href="#"
    data-target="#appModal"
    title="{{__('Eliminar cliente')}}"
    data-id="{{$user['id']}}"
>
    <i class="fas fa-trash btnDestroy"></i>

</a>
