@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 mt-4">
	    <div class="tile">
	    	<div id="overlay" class="overlay">
	            <div class="m-loader mr-4">
	                <svg class="m-circular" viewBox="25 25 50 50">
	                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
	                </svg>
	            </div>
	            <h3 class="l-text">Enviando</h3>
            </div>
			<h3 class="text-primary text-center">Configurarción de plan vacacional</h3>
			{!!Form::open(['url'=>'plan/vacacional','id'=>'formNewPlan'])!!}
				<p><b>Perido de inscripción</b></p>
				<div class="row">
					<div class="col-lg-6">
						{!!Field::text('startDate',['label'=>'Fecha de inicio', 'class'=>'date'])!!}
					</div>
					<div class="col-lg-6">
						{!!Field::text('endingDate',['label'=>'Fecha de culminación', 'class'=>'date'])!!}
					</div>
				</div>
				<p><b>Edades permitias</b></p>
				<div class="row">
					<div class="col-lg-4">
						{!!Field::text('minimumAge',['label'=>'Fecha de nacimiento minima', 'class'=>'date'])!!}
					</div>
					<div class="col-lg-2">
						{!!Field::text('age1',['label'=>'Edad', 'readOnly'=>'on'])!!}
					</div>
					<div class="col-lg-4">
						{!!Field::text('maximumAge',['label'=>'Fecha de nacimiento tope', 'class'=>'date'])!!}
					</div>
					<div class="col-lg-2">
						{!!Field::text('age2',['label'=>'Edad', 'readOnly'=>'on'])!!}
					</div>
				</div>
				<p><b>Perido del plan vacacional</b></p>
				<div class="row">
					<div class="col-lg-6">
					{!!Field::text('startDatePlan',['label'=>'Fecha de inicio', 'class'=>'date'])!!}
					</div>
					<div class="col-lg-6">
						{!!Field::text('endingDatePlan',['label'=>'Fecha de culminación', 'class'=>'date'])!!}
					</div>
				</div>
				<div class="row justify-content-center">
					<button type="submint" class="btn btn-secondary col-lg-4">Cacelar</button>
					<a  id="submintNewPlan" class="btn btn-primary col-lg-4 ml-2 text-white">Guardar</a>
				</div>
			{!!Form::close()!!}
	    </div>
    </div>
</div>
@endsection