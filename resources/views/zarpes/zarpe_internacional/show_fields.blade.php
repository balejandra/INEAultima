<strong>Detalle del Zarpe</strong>

<!-- Title Field -->
<div class="container">
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Nro. de Solicitud
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $permisoZarpe->nro_solicitud }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Fecha de Solicitud
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $permisoZarpe->created_at}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Bandera
                </div>
                <div class="col-md-3 col-sm-3 p-2 text-capitalize">
                    {{ $permisoZarpe->bandera }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th ">
                    Nombre Solicitante
                </div>
                <div class="col-md-3 col-sm-3 p-2 text-capitalize">
                    {{ $permisoZarpe->user->nombres}} {{ $permisoZarpe->user->apellidos}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Matrícula Buque
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $permisoZarpe->matricula }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Nombre Buque
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    @if($permisoZarpe->bandera=='extranjera')
                        <td>{{ $buque->nombre_buque }}</td>
                    @else
                        <td>{{ $buque->nombrebuque_actual }}</td>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Tipo de Navegación
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $permisoZarpe->tipo_zarpe->nombre }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Descripcion de Navegación
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{$descripcionNavegacion->descripcion}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Origen
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{$capitaniaOrigen->nombre}} <br> {{ $permisoZarpe->establecimiento_nautico->nombre }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Destino
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $pais[0]->name}} <br> {{$permisoZarpe->establecimiento_nautico_destino_zi}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Fecha y Hora Salida
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{$permisoZarpe->fecha_hora_salida }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Fecha y Hora Regreso
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{$permisoZarpe->fecha_hora_regreso }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Estatus
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $permisoZarpe->status->nombre }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">

                </div>
                <div class="col-md-3 col-sm-3 p-2">

                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($permisoZarpe->bandera=='nacional')
        <strong>Certificados de Seguridad Marítima</strong>

        <table class="table table-hover nooptionsearch border table-grow" style="width: 80%">
            <thead>
            <th>Tipo de Certificado</th>
            <th>Número de Certificado</th>
            <th>Fecha de Expedición</th>
            </thead>
            <tbody>
            @foreach($certificados as $certificado)
                <tr>
                    <td>{{ $certificado->nombre_certificado }}</td>
                    <td>{{$certificado->nro_correlativo}}</td>
                    <td>{{ $certificado->fecha_expedicion}}</td>

            @endforeach
        </table>

    @endif

    <br>
    <strong>Tripulantes</strong>
    <table class="table table-hover nooptionsearch border table-grow" style="width: 100%">
        <thead>
        <th>Función</th>
        <th>Nombres y Apellidos</th>
        <th>Cédula</th>
        <th>Rango</th>
        <th class="text-center">Pasaporte</th>
        </thead>
        <tbody>
        @foreach($tripulantes as $tripulante)
            <tr>
                <td>{{$tripulante->funcion}} </td>
                <td>{{$tripulante->nombres}} {{$tripulante->apellidos}} </td>
                <td>{{$tripulante->tipo_doc}}-{{$tripulante->nro_doc}}</td>
                <td>{{$tripulante->rango}} </td>
                <td class="text-center">
                    @if ($tripulante->doc)
                        <a class="document-link" title="Pasaporte"
                           href="{{asset('documentos/zarpeinternacional/'.$tripulante->doc)}}" target="_blank">
                            Pasaporte</a>
                    @endif
                </td>
        @endforeach
        </tbody>
    </table>
    <br>
    <strong>Pasajeros</strong>
    <table class="table table-hover nooptionsearch border table-grow" style="width: 80%">
        <thead>
        <th scope="col">Nombres y Apellidos</th>
        <th table-sm>Documentación</th>
        <th table-sm>Sexo</th>
        <th table-sm>Menor</th>
        <th table-sm>Documentos</th>
        </thead>
        <tbody>
        @foreach($pasajeros as $pasajero)
            <tr>
                <td> {{$pasajero->nombres}}  {{$pasajero->apellidos}}</td>
                <td> {{$pasajero->tipo_doc}}  {{$pasajero->nro_doc}}</td>
                <td>{{$pasajero->sexo}} </td>
                @if($pasajero->menor_edad==true)
                    <td>SI</td>
                    <td>
                        @if ($pasajero->pasaporte_menor)
                            <a class="link-info"
                               href="{{asset('documentos/permisozarpe/'.$pasajero->pasaporte_menor)}}"
                               target="_blank">
                                Pasaporte</a> <br>
                        @endif
                        @if ($pasajero->partida_nacimiento)
                            <a class="link-info"
                               href="{{asset('documentos/permisozarpe/'.$pasajero->partida_nacimiento)}}"
                               target="_blank">
                                Partida de Nacimiento</a> <br>
                        @endif
                        @if ($pasajero->autorizacion)
                            <a class="link-info"
                               href="{{asset('documentos/permisozarpe/'.$pasajero->autorizacion)}}" target="_blank">
                                Autorización</a>
                        @endif

                    </td>
                @else
                    <td>NO</td>
                    <td> @if ($pasajero->pasaporte_mayor)
                            <a class="link-info"
                               href="{{asset('documentos/permisozarpe/'.$pasajero->pasaporte_mayor)}}"
                               target="_blank">
                                Pasaporte</a>
                        @endif
                    </td>
            @endif
        @endforeach
        </tbody>
    </table>
    <br>
    <strong>Equipos de Seguridad</strong>
    <table class="table table-hover nooptionsearch border table-grow" style="width: 60%">
        <thead>
        <tr>
            <th>Equipo</th>
            <th>Cantidad</th>
            <th>Otros</th>
        </tr>
        </thead>
        <tbody>
        @foreach($equipos as $equipo)
            <tr>
                <td>
                    {{$equipo->equipo->equipo}}
                </td>

                <td>
                {{$equipo->cantidad}}

                <td>
                    @if($equipo->otros=="fecha_ultima_inspeccion")
                        Fecha de última inspección {{$equipo->valores_otros}}
                    @else
                        {{$equipo->otros}} {{$equipo->valores_otros}}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <strong>Historial de revisiones</strong>

    <table class="table table-hover nooptionsearch border table-grow" style="width: 100%">
        <thead>
        <tr>
            <th>Nombre y Apellido</th>
            <th>Acción</th>
            <th>Motivo</th>
            <th>Fecha</th>
        </tr>
        </thead>
        <tbody>
        @foreach($revisiones as $revision)
            <tr>
                <td>{{$revision->user->nombres}} {{$revision->user->apellidos}}</td>
                <td>{{$revision->accion}}</td>
                <td>{{$revision->motivo}}</td>
                <td>{{$revision->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<br>
<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    @if(($permisoZarpe->status->id=='3'))
        @can('aprobar-zarpe')
            <a data-route="{{route('statusInt',[$permisoZarpe->id,'aprobado',$permisoZarpe->establecimiento_nautico_id])}}"
               class="btn btn-success confirmation" title="Aprobar" data-action="APROBAR">
                Aprobar <i class="fa fa-check"></i>
            </a>
        @endcan
        @can('rechazar-zarpe')
        <!-- Button trigger modal -->
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-rechazo"
               onclick="modalrechazarzarpeZI({{$permisoZarpe->id}},'{{$permisoZarpe->nro_solicitud}}')">
                Rechazar <i class="fa fa-ban"></i>
            </a>
        @endcan
    @endif
    @if(($permisoZarpe->status->id=='1'))
        @can('informar-navegacion')
            <a class="btn btn-warning confirmation"
               data-route=" {{route('statusInt',[$permisoZarpe->id,'navegando',$permisoZarpe->establecimiento_nautico_id])}}"
               data-toggle="tooltip" data-bs-placement="bottom" title="Informar Navegación y Cerrar"
               data-action="INFORMAR NAVEGACIÓN de">
                Informar Navegación <i class="fas fa-water"></i>
            </a>
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-anular"
               onclick="modalanularzarpe({{$permisoZarpe->id}},'{{$permisoZarpe->nro_solicitud}}')"
               data-toggle="tooltip"
               data-bs-placement="bottom" title="Anular Solicitud">
                Anular <i class="fas fa-window-close"></i>
            </a>
        @endcan
    @endif
    @can('informar-arribo')
        @if ($permisoZarpe->status->id==5)
            <a class="btn btn-warning confirmation"
               data-route="{{route('statusInt',[$permisoZarpe->id,'cerrado',0])}}" data-toggle="tooltip"
               data-bs-placement="bottom" title="Informar Arribo" data-action="INFORMAR ARRIBO de">
                Informar Arribo <i class="fas fa-anchor"></i>
            </a>
        @endif
    @endcan
    @if(($permisoZarpe->status->id=='5'))
        @can('anular-sar')
            <a class="btn btn-outline-danger confirmation"
               data-route=" {{route('statusInt',[$permisoZarpe->id,'anulado_sar',$permisoZarpe->establecimiento_nautico_id])}}"
               data-toggle="tooltip" data-bs-placement="bottom" title="Anular por SAR" data-action="ANULAR POR SAR">
                Anular SAR <i class="fas fa-briefcase-medical"></i>
            </a>
        @endcan
    @endif

    @if (($permisoZarpe->status->id==1)||($permisoZarpe->status->id==4)||($permisoZarpe->status->id==5))
        <a class="btn btn-dark" href="{{route('zarpeInternacionalpdf',$permisoZarpe->id)}}"
           target="_blank" data-toggle="tooltip" data-bs-placement="bottom" title="Descargar PDF">
            Descargar PDF <i class="fas fa-file-pdf"></i>
        </a>
@endif

<!-- Modal Rechazar -->
    <div class="modal fade" id="modal-rechazo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="rechazar-zarpe" action="" class="modal-form">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Rechazar Solicitud Zarpe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Por favor indique el motivo del rechaz o de la Solicitud Nro. <span
                                id="solicitudzarpe"></span></p>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" aria-label="motivo" id="motivo1" name="motivo"
                                        onchange="motivoRechazo();" required>
                                    <option value="">Seleccione un motivo</option>
                                    <option value="Disposiciones del Ejecutivo Nacional">Disposiciones del Ejecutivo
                                        Nacional.
                                    </option>
                                    <option value="Instrucciones especiales de la autoridad acuática">Instrucciones
                                        especiales de la autoridad acuática.
                                    </option>
                                    <option value="Condiciones meteorológicas adversas">Condiciones meteorológicas
                                        adversas.
                                    </option>
                                    <option value="Observaciones en los documentos">Observaciones en los documentos
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 form-group" style="display: none" id="inputmotivo">
                            <input type="text" class="form-control" name="motivo" id="motivo2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" data-action="RECHAZAR">Rechazar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- ANULACION MODAL -->
    <div class="modal fade" id="modal-anular" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="anular-zarpe" action="" class="modal-form">
            <div class="modal-dialog modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Anular Solicitud Zarpe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Por favor indique el motivo de la anulación de la Solicitud Nro. <span
                                id="nrosolicitud"></span></p>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" aria-label="motivo" id="motivo1" name="motivo" required>
                                    <option value="">Seleccione un motivo</option>
                                    <option value="Incumplimiento de la normativa legal vigente">Incumplimiento de la
                                        normativa legal vigente.
                                    </option>
                                    <option value="Condiciones meteorológicas adversas">Condiciones meteorológicas
                                        adversas.
                                    </option>
                                    <option value="Restricciones de Navegación por motivos de Seguridad y Defensa">
                                        Restricciones de Navegación por motivos de Seguridad y Defensa.
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" data-action="ANULAR">Anular</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
