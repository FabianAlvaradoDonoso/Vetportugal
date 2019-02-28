<div class="form-group">
    {!! Form::label('name', 'Nombre')!!}
    {!! Form::text('name', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción')!!}
    {!! Form::text('description', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Precio')!!}
    {!! Form::text('price', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('imagen', 'Imagen')!!}
    {!! Form::file('imagen')!!}
</div>