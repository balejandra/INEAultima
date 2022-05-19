@extends('layouts.app')
@section("titulo")
    Menus
@endsection
@section('content')
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <a href="{!! route('menus.index') !!}">{{$titulo}}</a>
                </li>
                <li class="breadcrumb-item">Editar</li>
            </ol>
        </nav>
    </div>
    </header>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edición de {{$titulo}}</strong>

                              <div class="card-header-actions">
                                  <a href= "{{route('menus.index')}} " class="btn btn-primary btn-sm">Listado</a>
                              </div>
                          </div>
                          <div class="card-body">
                          </div>
                          <div class="card-body">
                           
                            <div class=" col-6  d-flex flex-wrap justify-content-center">           
                              {!! Form::model($menu, ['route' => ['menus.update', $menu->id], 'method' => 'patch']) !!}

                              @include('publico.menus.fields')

                              {!! Form::close() !!}
                              </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
