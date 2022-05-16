@extends('layouts.app')
@section("titulo")
    Zarpes
@endsection
@section('content')
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">Permisos de Zarpe</li>
            </ol>
        </nav>
    </div>
    </header>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')

            <div class="col-md-12" id="errorMat">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-ship"></i>
                            <strong>Solicitud de Permisos de Zarpe</strong>

                            <div class="card-header-actions">
                                <a class="btn btn-primary btn-sm" href="{{route('permisoszarpes.index')}}">Cancelar</a>
                            </div>

                        </div>
                        @php
                            $solicitud= json_decode(session('solicitud'));

                        @endphp
                        <div class="card-body" style="min-height: 350px;">
                            @include('zarpes.permiso_zarpe.stepsIndicator')

                            <form action="{{ route('permisoszarpes.permissionCreateSteptwo') }}" method="POST">
                                @csrf
                                <div class="card">
                                    <div class="card-body" style="min-height: 250px;">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="row gy-2 gx-3 justify-content-center">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="title">Siglas:</label>

                                                    <select id="siglas" name="siglas"
                                                            class="form-control custom-select">
                                                        <option value="">Seleccione</option>
                                                        @foreach($siglas as $sigla)
                                                            @if($matriculaActual[0] ==$sigla->sigla)
                                                                @php
                                                                    $selectedSigla="selected='selected'";
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $selectedSigla='';
                                                                @endphp
                                                            @endif

                                                            @if($sigla->sigla!='SEDE')
                                                                <option
                                                                    value="{{$sigla->sigla}}" {{$selectedSigla}} >{{$sigla->sigla}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="title">Destinación:</label>

                                                    <select id="destinacion1" name="destinación"
                                                            class="form-control custom-select">

                                                        @if($matriculaActual[1] =="RE")
                                                            @php
                                                                $selectedRE="selected='selected'";
                                                                $selectedDE='';

                                                            @endphp
                                                        @elseif($matriculaActual[1] =="DE")
                                                            @php
                                                                $selectedRE="";
                                                                $selectedDE="selected='selected'";
                                                            @endphp
                                                        @else
                                                            @php
                                                                $selectedRE="";
                                                                $selectedDE="";
                                                            @endphp
                                                        @endif

                                                        <option value="">Seleccione</option>
                                                        <option value="RE" {{$selectedRE}} >RE</option>
                                                        <option value="DE" {{$selectedDE}} >DE</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="title">Número:</label>
                                                    @if($matriculaActual[2]!="")
                                                        @php
                                                            $numero=$matriculaActual[2];
                                                        @endphp
                                                    @else
                                                        @php
                                                            $numero='';
                                                        @endphp
                                                    @endif
                                                    <input type="text" class="form-control" name="número" id="numero"
                                                           value="{{$numero}}" maxlength="4"
                                                           onKeyDown="return soloNumeros(event)">
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <br>
                                                <button type="button" class="btn btn-primary"
                                                        onclick="getmatricula($('#siglas').val(),$('#destinacion1').val(),$('#numero').val())">
                                                    Verificar
                                                </button>
                                            </div>
                                        </div>
                                        <br>
                                            <div class="row">
                                                <div class="col">
                                                    <div id="table-buque" style="display: none;">
                                                        <div class="text-center">
                                                            <h4>Datos de la embarcación</h4>
                                                        </div>

                                                        <table class="table table-bordered" id="table-nooptions" style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th>Dato</th>
                                                                <th>Resultado</th>
                                                                <th>Dato</th>
                                                                <th>Resultado</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <th width="25%" class="bg-light">MATRÍCULA</th>
                                                                <td><input type="text" class="col-md-12" id="matricula"
                                                                           name="matricula" value="" readonly></td>
                                                                <th width="20%" class="bg-light">NOMBRE</th>
                                                                <td><input type="text" class="col-md-12" id="nombre"
                                                                           name="nombre" readonly></td>
                                                            </tr>

                                                            <tr>
                                                                <th class="bg-light">DESTINACIÓN DEL BUQUE</th>
                                                                <td><input type="text" class="col-md-12"
                                                                           name="destinacion"
                                                                           id="destinacion" readonly></td>
                                                                <th class="bg-light">UAB</th>
                                                                <td><input type="text" class="col-md-12" name="UAB"
                                                                           id="UAB"
                                                                           readonly></td>
                                                            </tr>

                                                            <tr>
                                                                <th class="bg-light">PROPIETARIO</th>
                                                                <td><input type="text" class="col-md-12"
                                                                           name="nombre_propietario"
                                                                           id="nombre_propietario"
                                                                           readonly>
                                                                    <input type="text" name="nombre_propietario"
                                                                           id="nombre_propietario" hidden>
                                                                </td>
                                                                <th class="bg-light">CÉDULA / RIF</th>
                                                                <td>
                                                                    <input type="text" class="col-md-12"
                                                                           name="numero_identificacion"
                                                                           id="numero_identificacion" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="bg-light">ESLORA</th>
                                                                <td><input type="text" class="col-md-12" name="eslora"
                                                                           id="eslora" readonly></td>
                                                                <th class="bg-light">MANGA</th>
                                                                <td><input type="text" class="col-md-12" name="manga"
                                                                           id="manga" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="bg-light">LICENCIA DE NAVEGACIÓN</th>
                                                                <td><input type="text" class="col-md-12"
                                                                           name="licenciaNavegacion"
                                                                           id="licenciaNavegacion"
                                                                           readonly></td>
                                                                <th class="bg-light">ASIGNACIÓN DE NÚMERO ISMM</th>
                                                                <td><input type="text" class="col-md-12" name="ismm"
                                                                           id="ismm" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="bg-light">CERT. NAC. DE SEGURIDAD
                                                                    RADIOTELEFONICA
                                                                </th>
                                                                <td><input type="text" class="col-md-12"
                                                                           name="certificadoRadio" id="certificadoRadio"
                                                                           readonly></td>
                                                                <th class="bg-light"></th>
                                                                <td></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <div class="row">
                                                <div class="col text-left">
                                                    <a href="{{ route('permisoszarpes.createStepOne') }}"
                                                       class="btn btn-primary pull-right">Anterior</a>
                                                </div>
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
