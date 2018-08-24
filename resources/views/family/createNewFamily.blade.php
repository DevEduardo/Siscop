@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
	    <div class="tile">
	    	<div id="overlay" class="overlay">
	            <div class="m-loader mr-4">
	                <svg class="m-circular" viewBox="25 25 50 50">
	                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
	                </svg>
	            </div>
	            <h3 class="l-text">Enviando</h3>
            </div>
			{!!Form::open(['id'=>'formFamily'])!!}
				<div class="row justify-content-center">
					<input type="checkbox" id="less" name="noDocument" value="{{$person->document}}">
					<input type="hidden" id="numberNoDocument" value="{{$numberNoDocument}}">
					<label for="less"  class="mr-5">No posee cedula</label>
				</div>
				
				<div class="row">
					<div class="col-lg-4">{!!Field::text('document',['label'=>'Documento de identificacion','class'=>'document'])!!}</div>
					<div class="col-lg-4">{!!Field::text('firstName',['label'=>'Nombres'])!!}</div>
			    	<div class="col-lg-4">{!!Field::text('lastName',['label'=>'Apellidos'])!!}</div>
			    </div>

			    <div class="row">
	    			<div class="col-lg-3">{!!Field::text('birthdate',['label'=>'Fecha de nacimiento','class'=>'date'])!!}</div>
	    			<div class="col-lg-3">{!!Field::select('gender',['0'=>'Femenino','1'=>'Masculino'],['label'=>'Genero'])!!}</div>
	    			<div class="col-lg-3">{!!Field::select('civilStatus',['0'=>'Casado(a)','1'=>'Soltero(a)','2'=>'Divorciado(a)','3'=>'Viudo(a)'],['label'=>'Estado civil'])!!}</div>
	    			<div class="col-lg-3">{!!Field::select('kin',config('civilStatus'),['label'=>'Parentesco'])!!}</div>
	    		</div>
	    		<input type="hidden" name="person" value="{{ $person->id }}">
	    		<div class="row justify-content-center">
	    			<a id="submintFamily" class="btn btn-primary text-white col-lg-5">Registrar familiar</a>
	    		</div>
			{!!Form::close()!!}
	    </div>
    </div>
</div>
@endsection