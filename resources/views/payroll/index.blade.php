@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12" id="_dataPeople">
	    <div class="tile">
	    	<h4 class="text-center text-primary">Personas a ingresar en nómina</h4>
        <table class="table table-hover table-bordered" id="peopleTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Cédula</th>
              <th>Nombre y apellido</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($people as $key => $person)
						<tr>
							<td>{{ $key + 1  }}</td>
							<td>{{ $person->document }}</td>
							<td>{{ $person->firstName }} {{ $person->lastName }}</td>
							<td><a href="" class="newPayroll btn btn-sm btn-primary" data-id="{{ $person->id }}" data-name="{{ $person->firstName }} {{ $person->lastName }}">Generar contrato</a></td>
            </tr>
          	@endforeach
          </tbody>
        </table>
	    </div>
    </div>
    <div class="col-md-12 hidden" id="_newPeople">
	    <div class="tile">
        <div id="overlay" class="overlay">
          <div class="m-loader mr-4">
              <svg class="m-circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
              </svg>
          </div>
          <h3 class="l-text">Enviando</h3>
        </div>
			<h4 class="text-center ">Datos de nomina para: <b class="text-primary" id="personName">Person</b></h4>
			{!!Form::open(['url'=>'nomina','id'=>'formNewPayroll'])!!}
				<div class="row">
					<div class="col-md-4">{!!Field::select('type',['0'=>'Empleado','1'=>'Obrero'],['label'=>'Tipo'])!!}</div>
					<div class="col-md-4">{!!Field::select('workCondition',['0'=>'Contratado','1'=>'Fijo'],['label'=>'Condicon laboral'])!!}</div>
					<div class="col-md-4">{!!Field::text('code',['readOnly'=>'on','label'=>'Código de empleado'])!!}</div>
				</div>
				<div class="row">
					<div class="col-md-4">{!!Field::select('dependence',$dependencies,['label'=>'Dependencia'])!!}</div>
					<div class="col-md-4">{!!Field::select('departament',$departaments,['label'=>'Departamento'])!!}</div>
					<div class="col-md-4">{!!Field::select('position',$charges,['label'=>'Cargo a desempeñar'])!!}</div>
				</div>
				<div class="row">
					<div class="col-md-4">{!!Field::select('grade',null,['label'=>'Grado del cargo'])!!}</div>
					<div class="col-md-4">{!!Field::text('salary',['readOnly'=>'on','label'=>'Salario'])!!}</div>
					<div class="col-md-4">{!!Field::text('dateOfAdmission',['class'=>'date','label'=>'Fecha de contratacion'])!!}</div>
				</div>
				<div class="row">
					<div class="col-md-4">{!!Field::text('dueDate',['class'=>'date','label'=>'Fecha de culminacion del contrato'])!!}</div>
					<div class="col-md-4">{!!Field::text('bankAccount',['label'=>'Cuenta bancaria'])!!}</div>
					<div class="col-md-4">{!!Field::select('bank',$banks,['label'=>'Banco'])!!}</div>
				</div>
					<input type="hidden" name="person" id="person">
					<div class="row justify-content-center">
						<button type="submint" id="ancelPayroll" class="col-lg-3 btn btn-secondary">Cancelar</button>	
						<a href="" class="submintNewPayroll btn btn-primary ml-5 col-lg-3">Guardar datos</a>	
					</div>
			{!!Form::close()!!}
	    </div>
    </div>
</div>

<!-- Modal new dependence-->
<div class="modal" tabindex="-1" role="dialog" id="newDependence">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar dependencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!!Form::open(['id'=>'formDependencies'])!!}
        	{!!Field::text('dependence',['id'=>'dependenceModal','label'=>'Nombre de la dependencia','aoutcomplete'=>'off'])!!}
        {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a id="_depdendence"  class="btn btn-primary text-white">Guardar</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal new departament-->
<div class="modal" tabindex="-1" role="dialog" id="newDepartament">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar departamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!!Form::open(['id'=>'formDepartament'])!!}
        	{!!Field::text('departament',['id'=>'departamentModal','label'=>'Nombre del departamento','autocomplete'=>'off'])!!}
        {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a id="_departament" class="btn btn-primary text-white">Guardar</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal new position-->
<div class="modal" tabindex="-1" role="dialog" id="newPosition">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!!Form::open(['id'=>'formPosition'])!!}
        	{!!Field::text('position',['id'=>'positionModal','label'=>'Nombre del cargo'])!!}
        {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a id="_position" class="btn btn-primary text-white">Guardar</a>
      </div>
    </div>
  </div>
</div>
@endsection