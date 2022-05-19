<div class="row">
    <!-- Nombre Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Sigla Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('sigla', 'Siglas:') !!}
        {!! Form::text('sigla', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('capitanes', 'Capitán:') !!}
        {!! Form::select('capitanes',$capitanes, null, ['class' => 'form-control custom-select','placeholder' => 'Seleccione un capitan']) !!}
    </div>
</div>

{!! Form::label('coordenadas', 'Coordenas:') !!}

<div class="row">
    <!-- latitud Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('Latitud', 'Latitud:') !!}
        {!! Form::text('latitud[]', null, ['class' => 'form-control']) !!}
    </div>
    <!-- longitud Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('longitud', 'Longitud:') !!}
        {!! Form::text('longitud[]', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-3 pt-4">
    {!! Form::button('Agregar otras', ['class' => 'btn btn-success', 'onclick' => 'agregarCoordenadas()']) !!}
    </div>
</div>
<div  id="coords" data-cant='1'>

</div>

<!-- Button -->
<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12 text-center mt-3">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

    </div>
</div>
