@extends('layouts.app')
@section("titulo")
    Usuarios de Capitanias
@endsection
@section('content')
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Usuarios de Capitanias</li>
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
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Usuarios de Capitanias
                             @can('crear-usuarios-capitanias')
                                 <div class="card-header-actions">
                                     <a class="btn btn-primary btn-sm"  href="{{ route('capitaniaUsers.create') }}">Nuevo</a>
                                 </div>
                             @endcan
                         </div>
                         <div class="card-body">
                             @include('publico.capitania_users.table')
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

