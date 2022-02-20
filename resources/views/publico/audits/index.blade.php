@extends('layouts.app')
@section("titulo")
    Auditoria
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Auditoria</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Auditoria
                         </div>
                         <div class="card-body">
                             @include('publico.audits.table')
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection
