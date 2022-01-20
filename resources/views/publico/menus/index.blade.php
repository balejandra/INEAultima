@extends('layouts.app')
@section("titulo")
    Menus
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Menus</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')


             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             <strong>Menus</strong>
                             <div class="card-header-actions">
                                 <a class="btn btn-primary btm-sm"  href="{{ route('menus.create') }}">Nuevo</a>
                                 <a class="btn btn-primary btm-sm"  href="{{ route('menuRols.index') }}">Listado de Roles y Menus</a>
                             </div>
                         </div>
                         <div class="card-body">
                             @include('publico.menus.table')
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection
