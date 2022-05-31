@extends('layouts.app')
@section("titulo")
    Zarpes
@endsection
@section('content')
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">Permisos de {{$titulo}}</li>
            </ol>
        </nav>
    </div>
    </header>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header bg-zarpes text-white">
                             <i class="fas fa-ship"></i>
                             <strong>Solicitud de Permisos de {{$titulo}} | Paso 3</strong>

                             <div class="card-header-actions">
                                 <a class="btn btn-primary btn-sm"  href="{{route('zarpeInternacional.index')}}">Cancelar</a>

                             </div>

                         </div>
                         <div class="card-body" style="min-height: 350px;">

                         	@include('zarpes.zarpe_internacional.stepsIndicator')


                         	 <form action="{{ route('zarpeInternacional.permissionCreateStepThree') }}" method="POST">
                @csrf

                <div class="card">

@php
    $solicitud= json_decode(session('solicitud'));

    $tipozarpes=$solicitud->tipo_zarpe_id;
    $descripcion=$solicitud->descripcion_navegacion_id;
    $capitaniaOrigen=$solicitud->origen_capitania_id;
    $selectedcap='';
    $selectedtz='';
    $selecteddn="";

@endphp
                    <div class="card-body" style="min-height: 200px;">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-2"></div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="title">Tipo de Navegación:</label>

                                            <select id="tipo_de_navegacion" name="tipo_de_navegacion" class="form-control custom-select">
                                            <option value="">Seleccione</option>

                                              @foreach ($TipoZarpes as $tz)
                                                @if($tipozarpes==$tz->id)
                                                    @php
                                                    $selectedtz="selected='selected'";
                                                    @endphp
                                                @else
                                                    @php
                                                    $selectedtz='';
                                                    @endphp
                                                @endif
                                                <option value="{{$tz->id}}" {{$selectedtz}} >{{$tz->nombre}} </option>
                                            @endforeach
                                        </select>
                                        </div>

                                    </div>


                                <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="title">Capitanía de Origen:</label>

                                            <select id="capitania" name="capitania" class="form-control custom-select">
                                            <option value="">Seleccione</option>

                                              @foreach ($capitanias as $capitania)
                                                @if($capitaniaOrigen==$capitania->id)
                                                    @php
                                                    $selectedcap="selected='selected'";
                                                    @endphp
                                                @else
                                                    @php
                                                    $selectedcap='';
                                                    @endphp
                                                @endif
                                                <option value="{{$capitania->id}}" {{$selectedcap}} >{{$capitania->nombre}} </option>
                                            @endforeach
                                        </select>
                                        </div>

                                    </div>

                            </div>
                                <div class="col-md-2"></div>


                    </div>

                    <div class="card-footer text-right">
                        <div class="row">
                            @if($bandera=='extranjera')
                            <div class="col text-left">
				                <a href="{{ route('zarpeInternacional.CreateStepTwoE') }}" class="btn btn-primary pull-right">Anterior</a>
				            </div>
                            @else
                            <div class="col text-left">
				                <a href="{{ route('zarpeInternacional.CreateStepTwo') }}" class="btn btn-primary pull-right">Anterior</a>
				            </div>
                            @endif

				            <div class="col text-right">
				                <button type="submit" class="btn btn-primary">Siguiente</button>
				            </div>
				        </div>
                    </div>
                </div>
            </form>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection
