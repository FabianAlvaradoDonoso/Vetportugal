<div class="form-group">
    {!! Form::label('name', 'Nombre')!!}
    {!! Form::text('name', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('resumen', 'Resumen')!!}
    {!! Form::text('resumen', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción')!!}
    {!! Form::textarea('description', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('imagen', 'Imagen')!!}
    {!! Form::file('imagen')!!}
</div>