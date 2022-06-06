@push('scripts')
    <script src="{{asset('js/buscador.js')}}"></script>
@endpush
<!-- Cargo Field -->
<div class="row">
<div class="form-group col-md-4 col-sm-12">
    {!! Form::label('cargo', 'Cargo:') !!}
    {!! Form::select('cargo',$roles, null, ['class' => 'form-control custom-select','placeholder' => 'Seleccione un cargo','onchange="cargoCapitaniaUser();"']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-md-4 col-sm-12">
    {!! Form::label('email_user', 'Email del Usuario:') !!}
    {!! Form::text('email_user',null, null, ['id'=>'email_user','class' => 'form-control','placeholder' => 'Seleccione un usuario']) !!}
    <input type="text" name="user_id" id="user_id" hidden>
</div>
<div class="col-md-4 col-sm-12">
    {!! Form::label('user_id', 'Nombres y Apellidos:') !!}
    <input type="text" id="nombres" class="form-control" disabled>
</div>
<!-- Capitania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capitania_id', 'Capitanía:') !!}
    {!! Form::select('capitania_id', $capitania, null, ['class' => 'form-control custom-select','placeholder' => 'Seleccione una capitania','onclick="EstablecimientoUser();"']) !!}
</div>

    <div class="form-group col-sm-6" id="divestablecimiento" style="display: block">
        {!! Form::label('establecimientos', 'Establecimiento Náutico Asignado:') !!}
        {!! Form::select('establecimiento_nautico_id',[], null, ['id'=>'establecimientos','class' => ' form-control custom-select','placeholder' => 'Escoja una Capitanía para cargar los Establecimientos...']) !!}
    </div>

<!-- Submit Field -->
    <div class="row form-group  mt-4">
        <div class="col text-center">
            <a href="{{route('capitaniaUsers.index')}} " class="btn btn-primary btncancelarZarpes">Cancelar</a>
        </div>
        <div class="col text-center">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
