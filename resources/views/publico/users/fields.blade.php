<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
    {!! Form::label('password', 'Confirmar Contraseña:') !!}
    <input type="password" name="password_confirmation" class="form-control"
           placeholder={{ __('Confirm Password') }}>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('role id', 'Rol asignado:') !!}
    {!! Form::select('roles', $roles, null, ['class' => 'form-control custom-select','placeholder' => 'Puede asignar un Rol...']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

<input type="text" name="tipo_usuario" value="interno" hidden>
