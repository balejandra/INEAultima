<!-- Nombre Buque Field -->
<div class="row">
<div class="form-group col-sm-6">
    {!! Form::label('nombre_buque', 'Nombre del Buque:') !!}
    {!! Form::text('nombre_buque', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Numero Registro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nro_registro', 'Nro de Registro del Buque:') !!}
    {!! Form::text('nro_registro', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tipo Buque Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_buque', 'Tipo de Buque:') !!}
    <select name="tipo_buque" id="tipo_buque" class="form-control custom-select" placeholder='Seleccione' required>
        <option value="deportivo">Deportivo</option>
        <option value="recreativo">Recreativo</option>
    </select>
</div>

<!-- Nacionalidad Buque Field -->
<div class="form-group col-sm-6" id="nacionalidad">

</div>

<!-- Propietario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_propietario', 'Nombre del Propietario:') !!}
    {!! Form::text('nombre_propietario', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Pasaporte Capitan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pasaporte_capitan', 'Nro. Pasaporte del Capitán:') !!}
    {!! Form::text('pasaporte_capitan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nombrescompletos Capitan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_capitan', 'Nombre y Apellido del Capitán:') !!}
    {!! Form::text('nombre_capitan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Eslora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cant_tripulantes', 'Cantidad de Tripulantes:') !!}
    {!! Form::number('cant_tripulantes', null, ['class' => 'form-control', 'required','onKeyDown'=>"return soloNumeros(event)"]) !!}
</div>

    <div class="form-group col-sm-6">
        {!! Form::label('cant_pasajeros', 'Cantidad máxima  de personas a bordo:') !!}
        {!! Form::number('cant_pasajeros', null, ['class' => 'form-control', 'required','onKeyDown'=>"return soloNumeros(event)"]) !!}
    </div>

<!-- Arqueo Bruto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arqueo_bruto', 'Arqueo Bruto del Buque:') !!}
    {!! Form::number('arqueo_bruto', null, ['class' => 'form-control', 'required','onKeyDown'=>"return soloNumeros(event)"]) !!}
</div>
    <!-- Eslora Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('eslora', 'Eslora:') !!}
        {!! Form::text('eslora', null, ['class' => 'form-control', 'required','onKeyDown'=>"return soloNumeros(event)"]) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('potencia_kw', 'Potencia KW:') !!}
        {!! Form::text('potencia_kw', null, ['class' => 'form-control', 'required','onKeyDown'=>"return soloNumeros(event)"]) !!}
    </div>
<!-- Actividades Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actividades', 'Actividades que realizará:') !!}
    <select name="actividades" id="actividades" class="form-control custom-select" placeholder='Seleccione' required>
        <option value="deportivo">Deportivo</option>
        <option value="recreativo">Recreativo</option>
        <option value="cambio de bandera">Cambio de Bandera</option>
        <option value="mantenimiento">Mantenimiento</option>
    </select>
</div>

<!-- Puerto Origen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('puerto_origen', 'Puerto de Origen / País:') !!}
    {!! Form::text('puerto_origen', null, ['class' => 'form-control'], 'required') !!}
</div>

<!-- Ultimo Puertovisitado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capitania_id', 'Circunscripción Acuática de Arribo:') !!}
    <select id="capitania_id" name="capitania_id"
            class="form-control custom-select {{ $errors->has("capitania_id")?"is-invalid":"" }}"  required>
        <option value="">Seleccione</option>
        @foreach ($capitanias as $capitania)
            <option value="{{$capitania->id}}">{{$capitania->nombre}} </option>
        @endforeach
    </select>
    @error('capitania_id')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<!-- Tiempo Estadia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tiempo_estadia', 'Vigencia:') !!}
    <input type="text" name="tiempo_estadia" readonly value="90 días" id="tiempo_estadia" class="form-control">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('documento_1', 'Zarpe original de procedencia:') !!}
    <input type="file" class="form-control" name="zarpe_procedencia" id="zarpe_procedencia" accept="application/pdf" required>
</div>
    <div class="form-group col-sm-6">
        {!! Form::label('documento_1', 'Registro de la embarcación:') !!}
        <input type="file" class="form-control" name="registro_embarcacion" id="registro_embarcacion" accept="application/pdf" required>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('documento_1', 'Despacho de aduana de procedencia:') !!}
        <input type="file" class="form-control" name="despacho_aduana_procedencia" id="despacho_aduana_procedencia" accept="application/pdf" required>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('documento_1', 'Pasaportes de los tripulantes:') !!}
        <input type="file" class="form-control" name="pasaportes_tripulantes" id="pasaporte_tripulantes" accept="application/pdf" required>
    </div>

</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('permisosestadia.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
