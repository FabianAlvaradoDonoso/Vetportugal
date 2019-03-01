@extends('pagesystem.system.layouts.master');
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @foreach ($Appointments as $key =>$value)
                    <p>Nombre : {{$value->vet->user->name}}</p>
                    <p>estado Hora: {{$value->state->state}}</p>
                    <p>HORA: {{$value->dateTime}}</p>
                @endforeach
            </div>
        </div>
    </section>

@endsection
