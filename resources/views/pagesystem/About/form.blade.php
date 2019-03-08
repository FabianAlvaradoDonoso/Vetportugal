<div class="form-group">
    {!! Form::label('name', 'Titulo')!!}
    {!! Form::text('name', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('subtitle', 'Sub-título')!!}
    {!! Form::text('subtitle', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('btntitle', 'Título del botón')!!}
    {!! Form::text('btntitle', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('linkbtn', 'enlace del boton')!!}
    {!! Form::text('linkbtn', null, ['class'=> 'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('imagen', 'Imagen')!!}
    {!! Form::file('imagen')!!}
</div>