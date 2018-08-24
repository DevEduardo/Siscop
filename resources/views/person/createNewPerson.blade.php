@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="bs-component">
				<div id="list-group" class="list-group">
					<a id="data" class="item list-group-item list-group-item-action active"><i class="icon fa fa-user"></i> Datos Personales</a>
					<a id="address" class="item list-group-item list-group-item-action"><i class="icon fa fa-map-o"></i> Direccion</a>
					<a id="study" class="item list-group-item list-group-item-action"><i class="icon fa fa-mortar-board"></i> Estudios</a>
					<a id="training" class="item list-group-item list-group-item-action"><i class="icon fa fa-book"></i> Cursos</a>
				</div>
            </div>
	    </div>
	    <div class="col-md-9">
		    <div id="_data" class="divList tile">
		    	<div id="overlay" class="overlay">
		            <div class="m-loader mr-4">
		                <svg class="m-circular" viewBox="25 25 50 50">
		                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
		                </svg>
		            </div>
		            <h3 class="l-text">Enviando</h3>
	            </div>
		    	
		    	<div class="row justify-content-center">
		    		{!!Form::open(['class'=>'col-lg-12','id'=>'formPerson','enctype'=>'multipart/form-data'])!!}
			    		<div class="row">
			    			<div class="col-lg-4">{!!Field::text('document',['label'=>'Documento de identificacion'])!!}</div>
			    			<div class="col-lg-4">{!!Field::text('firstName',['label'=>'Nombres'])!!}</div>
			    			<div class="col-lg-4">{!!Field::text('lastName',['label'=>'Apellidos'])!!}</div>
			    		</div>
			    		<div class="row">
			    			
			    		</div>
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::text('birthdate',['label'=>'Fecha de nacimiento','class'=>'date'])!!}</div>
			    			<div class="col-lg-6">{!!Field::select('gender',['0'=>'Femenino','1'=>'Masculino'],['label'=>'Genero'])!!}</div>
			    		</div>
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::text('phone',['label'=>'Telefono personal'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('telephone',['label'=>'Telefono de habitacion'])!!}</div>
			    		</div>
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::text('email',['label'=>'Correo electronico'])!!}</div>
			    			<div class="col-lg-6">{!!Field::select('civilStatus',['0'=>'Casado(a)','1'=>'Soltero(a)','2'=>'Divorciado(a)','3'=>'Viudo(a)'],['label'=>'Estado civil'])!!}</div>
			    		</div>
			    		<div class="row">
			    			<div class="col-lg-12">{!!Field::file('picture',['label'=>'Foto de perfil'])!!}</div>
			    		</div>
			    		<div class="row justify-content-center">
			    			<a id="submintData" class="btn btn-primary text-white col-lg-5">Registrar datos</a>
			    		</div>
			    	{!!Form::close()!!}
		    	</div>
		    </div>
		    <div id="_address" class="divList tile hidden">
		    	<div id="overlay" class="overlay">
		            <div class="m-loader mr-4">
		                <svg class="m-circular" viewBox="25 25 50 50">
		                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
		                </svg> 
		            </div>
		            <h3 class="l-text">Enviando</h3>
	            </div>
		    	
		    	<div class="row justify-content-center">
		    		{!!Form::open(['class'=>'col-lg-12','id'=>'formAddress'])!!}
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::select('country',['0'=>'Venezuela'],['label'=>'Pais'])!!}</div>
			    			<div class="col-lg-6">{!!Field::select('estate',$estate,['label'=>'Estado'])!!}</div>
			    			<div class="col-lg-6">{!!Field::select('city',null,['label'=>'Ciudad'])!!}</div>
			    			<div class="col-lg-6">{!!Field::select('municipality',null,['label'=>'Municipio'])!!}</div>
			    		</div>
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::select('parish',[],['label'=>'Parroquia'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('sector',['label'=>'Sector de residencia'])!!}</div>
			    		</div>
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::text('street',['label'=>'Calle/Avenida/Vereda'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('dwelling',['label'=>'Casa/Apartamento'])!!}</div>
			    		</div>
			    		<input type="hidden" class="person" name="person">
			    		<div class="row justify-content-center">
			    			<a id="submintAddress" class="btn btn-primary text-white col-lg-5">Registrar direccion</a>
			    		</div>
			    	{!!Form::close()!!}
		    	</div>
		    </div>
		    <div id="_study" class="divList tile hidden">
		    	<div id="overlay" class="overlay">
		            <div class="m-loader mr-4">
		                <svg class="m-circular" viewBox="25 25 50 50">
		                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
		                </svg>
		            </div>
		            <h3 class="l-text">Enviando</h3>
	            </div>
		    	
		    	<div class="row justify-content-center">
		    		{!!Form::open(['class'=>'col-lg-12','id'=>'formStudy'])!!}
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::select('instruction',config('instruction'),['label'=>'Grado de instruccion'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('grade',['label'=>'Titulo'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('egressDate',['label'=>'Fecha de egreso','class'=>'date'])!!}</div>
			    			<div class="col-lg-6">{!!Field::file('picture',['label'=>'Certificado'])!!}</div>
			    		</div>
			    		<input type="hidden" class="person" name="person">
			    		<div class="row justify-content-center">
			    			<a id="submintStudy" class="btn btn-primary text-white col-lg-5">Registrar estudios</a>
			    		</div>
			    	{!!Form::close()!!}
		    	</div>
		    </div>
		    <div id="_training" class="divList tile hidden">
		    	<div id="overlay" class="overlay">
		            <div class="m-loader mr-4">
		                <svg class="m-circular" viewBox="25 25 50 50">
		                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
		                </svg>
		            </div>
		            <h3 class="l-text">Enviando</h3>
	            </div>
		    	
		    	<div class="row justify-content-center">
		    		{!!Form::open(['class'=>'col-lg-12','id'=>'formFormation'])!!}
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::select('type',config('type'),['label'=>'Tipo de formacion'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('description',['label'=>'Descripcion de la formacion'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('endingDate',['label'=>'Fecha de culminacion','class'=>'date'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('hours',['label'=>'Horas de estudio'])!!}</div>
			    			<div class="col-lg-6">{!!Field::file('picture',['label'=>'Certificado'])!!}</div>
			    		</div>
			    		<input type="hidden" class="person" name="person">
			    		<div class="row justify-content-center">
			    			<a id="submintFormation" class="btn btn-primary text-white col-lg-5">Registrar formacion</a>
			    		</div>
			    	{!!Form::close()!!}
		    	</div>
		    </div>
	    </div>
	</div>
@endsection