@extends('layouts/auth')
@section("titulo")
    Registro
@endsection
@section('content')
    @push('scripts')
        <script src="{{asset('js/register.js')}}"></script>
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <span>
                    <img src="{{asset('images/inea.png')}}" alt="inealogo" class="nav-avatar">
                </span>
                <div class="card mx-4">
                    <div class="card-body p-4">

                        <form method="post" action="{{ url('/register') }}">
                            @csrf
                            <h1>{{ __('Register') }}</h1>
                            <p class="text-muted">Crear tu cuenta</p>
                            <div class="form-row">
                                <!--////////// NATURAL O JURIDICA //////////////-->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipo_persona" id="natural" value="natural"
                                                onclick="javascript:showContentNatural()" required checked>
                                                <label class="form-check-label" for="natural">
                                                    Natural
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipo_persona" id="juridica" value="juridica"
                                                       onclick="javascript:showContent()" required>
                                                <label class="form-check-label" for="juridica">
                                                    Juridica
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-none d-md-block"></div>
                                <!--- ////// TIPO DOCUMENTO ///// -->
                                <div class="col-md-6 col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-passport"></i></span>
                                        </div>
                                        <select class="form-select" aria-label="tipo_identificacion" id="tipo_identificacion"
                                                name="tipo_identificacion" onchange="changetipodocumento();" required>
                                            <option value="cedula">Cedula</option>
                                            <option value="pasaporte">Pasaporte</option>
                                        </select>
                                        @if ($errors->has('tipo_identificacion'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('tipo_identificacion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <!--- /////// NUMERO DE IDENTIFICACION /////// -->
                                <div class="col-md-6 col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                        </div>
                                        <input type="text"
                                               class="form-control {{ $errors->has("numero_identificacion")?"is-invalid":"" }}"
                                               name="numero_identificacion" value="{{ old('numero_identificacion') }}"
                                               placeholder="Numero de identificacion" id="numero_identificacion" required>
                                    </div>
                                </div>
                                <div class="w-100 d-none d-md-block"></div>
                                <!-- /////// FECHA DE NACIMIENTO ///// -->
                                <div class="col-md-12 col-sm-12" id="fechanacimiento">
                                    <div class="input-group mb-3" id="nacimiento">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date"
                                               class="form-control "
                                               name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" id="fecha_nacimiento"
                                               placeholder="fecha_nacimiento" required onblur="getEmployees($('#numero_identificacion').val(),$('#fecha_nacimiento').val())" >
                                    </div>
                                </div>
                                <div class="w-100 d-none d-md-block"></div>
                                <!--////////// NOMBRES //////////////-->
                                <div class="col-md-6 col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                               class="form-control"
                                               name="nombres" value="{{ old('nombres') }}" id="nombres"
                                               placeholder="Nombres" required>
                                    </div>
                                </div>

                                <!--////////// APELLIDOS //////////////-->
                                <div class="col-md-6 col-sm-12" id="apellidosdiv">
                                    <div id="apellidosdivint">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input type="text"
                                                   class="form-control"
                                                   name="apellidos" value="{{ old('apellidos') }}" id="apellidos"
                                                   placeholder="Apellidos" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-none d-md-block"></div>
                                <!--////////// TELEFONO //////////////-->
                                <div class="col-md-6 col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                               class="form-control"
                                               name="telefono" value="{{ old('telefono') }}"
                                               placeholder="Telefono" required>
                                    </div>
                                </div>
                                <!--////////// DIRECCION //////////////-->
                                <div class="col-md-6 col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                               class="form-control"
                                               name="direccion" value="{{ old('direccion') }}"
                                               placeholder="direccion" required>
                                    </div>
                                </div>
                                <div class="w-100 d-none d-md-block"></div>
                                <!--////////// EMAIL //////////////-->
                                <div class="col-md-12 col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email"
                                               class="form-control"
                                               name="email"
                                               value="{{ old('email') }}" placeholder="Email" required>
                                    </div>
                                </div>
                                <!--////////// PASSWORD //////////////-->
                                <div class="col-md-12 col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password"
                                               class="form-control {{ $errors->has('password')?'is-invalid':''}}"
                                               name="password" placeholder="Contraseña" required>
                                    </div>
                                </div>
                                <!--////////// PASSWORD CONFIRMATION //////////////-->
                                <div class="col-md-12 col-sm-12">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password_confirmation" class="form-control" required
                                               placeholder={{ __('Confirm Password') }}>
                                    </div>
                                </div>

                                <!--////////// BOTON //////////////-->
                                <button type="submit" class="btn btn-primary btn-block btn-flat" id="btonregister" disabled>{{ __('Register') }}</button>
                                <a href="{{ url('/login') }}"
                                   class="text-center">{{ __('I already have a membership')}}</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
