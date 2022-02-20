@extends('layouts.app')
@section("titulo")
    Zarpes
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Permisos de Zarpe</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fas fa-ship"></i>
                             <strong>Solicitud de Permisos de Zarpe</strong>

                             <div class="card-header-actions">
                                 <a class="btn btn-primary btn-sm"  href="{{route('permisoszarpes.index')}}">Listado</a>

                             </div>

                         </div>
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
				  						<div class="row">
				  							<div class="col-md-4"></div>

				  							<div class="col-md-4">
				  								
				  								<div class="form-group">
				                                	<label for="title">Matricula:</label>
				                                	<input type="text" class="form-control" id="matricula"  name="matricula">
				                            	</div>

				  							</div>
				  							<div class="col-md-4"></div>
				  							
				  						</div>
				                            
				                            
				                          
				                    </div>
				  
				                    <div class="card-footer text-right">
				                    	<div class="row">
				                    		<div class="col-md-6 text-left">
				                                <a href="{{ route('permisoszarpes.createStepOne') }}" class="btn btn-primary pull-right">Previous</a>
				                            </div>
				                            <div class="col-md-6 text-right">
				                                <button type="submit" class="btn btn-primary">Next</button>
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