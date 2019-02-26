@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="animated fadeIn slow" method="post" style="background-color: rgba(30,40,51,0.9);">
        <h2 class="sr-only">Bienvenido</h2>
        <div class="illustration"><i class="icon ion-checkmark-round"></i></div>
            <div class="form-group">
                <label class="text-center">Bienvenido! Redirecionando automaticamente al Dashboard</label>
            </div>
            <a href="{{url('/dash')}}" class="forgot">Haz click aqui para redireccionar</a>
    </form>


<script>
    function r() { location.href="{{url('/dash')}}" }
	setTimeout ("r()", 3000);
</script>
@endsection
