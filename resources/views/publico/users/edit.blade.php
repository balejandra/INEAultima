@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('users.index') !!}">Usuarios</a>
          </li>
          <li class="breadcrumb-item active">Editar</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Editar Usuario</strong>
                              <div class="card-header-actions">
                                  <a href= "{{route('users.index')}} " class="btn btn-primary btn-sm">Listado de Usuarios</a>
                              </div>
                          </div>
                          <div class="card-body">
                              {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                              @include('publico.users.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection