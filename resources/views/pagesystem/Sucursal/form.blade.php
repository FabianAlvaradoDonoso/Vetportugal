<div class="form-group">
    {!! Form::label('name', 'Nombre')!!}
    {!! Form::text('name', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('adress', 'Dirección')!!}
    {!! Form::text('adress', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('phone', 'Fono fijo')!!}
    {!! Form::text('phone', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('cellphone', 'Celular de contacto')!!}
    {!! Form::text('cellphone', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('mail', 'Mail de contacto')!!}
    {!! Form::text('mail', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción')!!}
    {!! Form::text('description', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('maplink', 'Enlace Google Maps')!!}
    {!! Form::text('maplink', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('youtubevideo', 'Enlace Video Youtube')!!}
    {!! Form::text('youtubevideo', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('imagen', 'Imagen')!!}
    {!! Form::file('imagen')!!}
</div>