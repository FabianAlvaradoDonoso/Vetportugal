<div class="form-group">
    <br>
    {{ Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required']) }}

    </div>

    {{ Form::label('last_name', 'Apellidos', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-3">
        {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name', 'required']) }}

    </div>

</div>

<div class="form-group">
    <br>
    {{ Form::label('landline', 'Teléfono fijo', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        {{ Form::text('landline', null, ['class' => 'form-control', 'id' => 'landline']) }}


        @if ($errors->has('landline'))
            <span class="help-block">
                                        <strong style=" color: red;">{{ $errors->first('landline') }}</strong>
                                    </span>
        @endif

    </div>

    {{ Form::label('mobile_phone', 'Celular', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-3">
        {{ Form::text('mobile_phone', null, ['class' => 'form-control', 'id' => 'mobile_phone']) }}

        @if ($errors->has('mobile_phone'))
            <span class="help-block">
                                        <strong style=" color: red;">{{ $errors->first('mobile_phone') }}</strong>
                                    </span>
        @endif

    </div>

</div>

<div class="form-group">
    <br>
    {{ Form::label('city', 'Ciudad', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'required']) }}

    </div>

    {{ Form::label('commune', 'Comuna', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('commune', null, ['class' => 'form-control', 'id' => 'commune', 'required']) }}

    </div>

    {{ Form::label('street', 'Calle', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('street', null, ['class' => 'form-control', 'id' => 'street', 'required']) }}

    </div>

    {{ Form::label('numeration', 'Numeración', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-1">
        {{ Form::text('numeration', null, ['class' => 'form-control', 'id' => 'numeration', 'required']) }}

    </div>

</div>

<div class="form-group">
    <br>
    {{ Form::label('email', 'Correo electrónico', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'required']) }}

        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong style=" color: red;">{{ $errors->first('email') }}</strong>
                                    </span>
        @endif

    </div>

    {{ Form::label('password', 'Contraseña', ['class' => 'col-sm-1 control-label']) }}

    <div class="col-sm-2">
        {{ Form::password('password',['class' => 'form-control', 'id' => 'password', 'required']) }}

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                                        <strong  style=" color: red;">{{ $errors->first('password') }}</strong>
                                    </span>
        @endif

    </div>

    {{ Form::label('password-confirm', 'Confirmación', ['class' => 'col-sm-1 control-label']) }}

    <div class="col-sm-2">
        {{ Form::password('password-confirm',['class' => 'form-control', 'id' => 'password-confirm', 'required', 'placeholder' => 'Vuelva a escribir su contraseña']) }}

    </div>

</div>




<div class="form-group">
    <br>

    {{ Form::label('image', 'Imagen', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        {{ Form::file('image') }}
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                                        <strong  style=" color: red;">{{ $errors->first('image') }}</strong>
                                    </span>
        @endif

    </div>

    {{ Form::label('slug', 'URL amigable', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug', 'readonly']) }}

    </div>


</div>

<div class="form-group align-content-center">
    <br>
    <div class="col-sm-4"></div>
    <div class="col-sm-3 pull-center">

        {{ Form::submit('Crear', ['class' => 'btn btn-primary btn-block ']) }}
    </div>



</div>



