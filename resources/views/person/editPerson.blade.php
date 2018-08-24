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
					<a id="family" class="item list-group-item list-group-item-action"><i class="icon fa fa-users"></i> Familiares</a>
				</div>
            </div>
	    </div>
	    <div class="col-md-9">
		    <div id="_data" class="divList tile">		    	
		    	<div id="_contentEditData" class="row justify-content-center">
		    		<div class="col-lg-3 text-center">
				          <img src="{{$person->picture}}" class="img-file">
		        	</div>
		        	<div class="col-md-8">
		        		<p><b>Documento de identificacion:</b> {{ $person->nacionality }}-{{ $person->document }}</p>
			    		<p><b>Nombres:</b> {{ $person->firstName }}</p>
			    		<p><b>Apellidos:</b> {{ $person->lastName }}</p>
			    		<p><b>Fecha de nacimiento:</b> {{ $person->birthdate }}</p>
			    		<p><b>Genero:</b> {{ gender($person->gender) }}</p>
			    		<p><b>Telefono personal:</b> {{ $person->phone }}</p>
			    		<p><b>Telefono de Habitacion:</b> {{ $person->telephone }}</p>
			    		<p><b>Correo electronico:</b> {{ $person->email }}</p>
			    		<p><b>Estado civil:</b> {{ civilStatus($person->civilStatus) }}</p>
		        	</div>
		    		<div class="col-md-1">
		    			<a href="" id="editData" class=""><i class="icon fa fa-2x fa-edit"></i></a>
		    		</div>
		    	</div>
		    	<div id="_formEditData" class="hidden">
		    		<div id="overlay" class="overlay">
			            <div class="m-loader mr-4">
			                <svg class="m-circular" viewBox="25 25 50 50">
			                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
			                </svg>
			            </div>
			            <h3 class="l-text">Enviando</h3>
		            </div>
			    	
			    	<div class="row justify-content-center">
			    		{!!Form::open(['class'=>'col-lg-12','id'=>'formEditPerson','enctype'=>'multipart/form-data'])!!}
				    		<div class="row">
				    			<div class="col-lg-4">{!!Field::text('document',$person->document,['label'=>'Documento de identificacion'])!!}</div>
				    			<div class="col-lg-4">{!!Field::text('firstName',$person->firstName,['label'=>'Nombres'])!!}</div>
				    			<div class="col-lg-4">{!!Field::text('lastName',$person->lastName,['label'=>'Apellidos'])!!}</div>
				    		</div>
				    		<div class="row">
				    			
				    		</div>
				    		<div class="row">
				    			<div class="col-lg-6">{!!Field::text('birthdate',$person->birthdate,['label'=>'Fecha de nacimiento','class'=>'date'])!!}</div>
				    			<div class="col-lg-6">{!!Field::select('gender',['0'=>'Femenino','1'=>'Masculino'],$person->gender,['label'=>'Genero'])!!}</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-lg-6">{!!Field::text('phone',$person->phone,['label'=>'Telefono personal'])!!}</div>
				    			<div class="col-lg-6">{!!Field::text('telephone',$person->telephone,['label'=>'Telefono de habitacion'])!!}</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-lg-6">{!!Field::text('email',$person->email,['label'=>'Correo electronico'])!!}</div>
				    			<div class="col-lg-6">{!!Field::select('civilStatus',['0'=>'Casado(a)','1'=>'Soltero(a)','2'=>'Divorciado(a)','3'=>'Viudo(a)'],$person->civilStatus,['label'=>'Estado civil'])!!}</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-lg-12">{!!Field::file('picture',['label'=>'Foto de perfil'])!!}</div>
				    		</div>
				    		<input type="hidden" id="person" value="{{ $person->id }}">
				    		<div class="row justify-content-center">
				    			<a id="cancelEdit" class="btn btn-danger text-white col-lg-5 mr-5">Cancelar</a>
				    			<a id="submintEditData" class="btn btn-primary text-white col-lg-5">Registrar datos</a>
				    		</div>
				    	{!!Form::close()!!}
			    	</div>
		    	</div>
		    </div>
		    <div id="_address" class="divList tile hidden">
		    	<div id="_contentEditAddress" class="row justify-content-center">
		    		<div class="col-lg-11">
		        		<p><b>Pais:</b> Venezuela</p>
			    		<p><b>Estado:</b> 
			    			@foreach($estates as $estate)
								@if($estate->id_estado == $address->estate )
				    			{{ $estate->estado }}
				    			@endif
				    		@endforeach
			    		</p>
			    		<p><b>Ciudad:</b> 
							@foreach($citys as $city)
								@if($city->id_ciudad == $address->city )
				    			{{ $city->ciudad }}
				    			@endif
				    		@endforeach
			    		</p>
			    		<p><b>Municipio:</b> 
							@foreach($municipalities as $municipality)
								@if($municipality->id_municipio == $address->municipality )
				    			{{ $municipality->municipio }}
				    			@endif
				    		@endforeach
				    	</p>
			    		<p><b>Parroquia:</b> 
							@foreach($parishes as $parish)
								@if($parish->id_parroquia == $address->parish )
				    			{{ $parish->parroquia }}
				    			@endif
				    		@endforeach
				    	</p>
			    		<p><b>Sector:</b> {{ $address->sector }}</p>
			    		<p><b>Calle/Avenida/Vereda:</b> {{ $address->street }}</p>
			    		<p><b>Casa/Apartamento:</b> {{ $address->dwelling }}</p>
			    	</div>
		    		<div class="col-lg-1">
		    			<a href="" id="editAddress" class=""><i class="icon fa fa-edit fa-2x"></i></a>
		    		</div>
		    	</div>
		    	<div id="_formEditAddress" class="hidden">
		    		<div id="overlay" class="overlay">
			            <div class="m-loader mr-4">
			                <svg class="m-circular" viewBox="25 25 50 50">
			                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
			                </svg>
			            </div>
			            <h3 class="l-text">Enviando</h3>
		            </div>
		    		{!!Form::open(['class'=>'col-lg-12','id'=>'formEditAddress'])!!}
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::select('country',['0'=>'Venezuela'],$address->country,['label'=>'Pais'])!!}</div>
			    			<div class="col-lg-6">
								<div id="field_estate" class="form-group">
									<label for="estate">Estado</label>
									<select name="estate" id="estate" class="form-control">
										@foreach($estates as $estate)
											@if($estate->id_estado == $address->estate)
												<option value="{{ $estate->id_estado }}" selected="selected">{{ $estate->estado }}</option>
											@else
												<option value="{{ $estate->id_estado }}">{{ $estate->estado }}</option>
											@endif
										@endforeach
									</select>
								</div>
			    			</div>
			    			<div class="col-lg-6">
								<div id="field_city" class="form-group">
									<label for="city">Ciudad</label>
									<select name="city" id="city" class="form-control">
										@foreach($citys as $city)
											@if($city->id_ciudad == $address->city)
												<option value="{{ $city->id_ciudad }}" selected="selected">{{ $city->ciudad }}</option>
											@else
												<option value="{{ $city->id_ciudad }}">{{ $city->ciudad }}</option>
											@endif
										@endforeach
									</select>
								</div>
			    			</div>
			    			<div class="col-lg-6">
								<div id="field_municipality" class="form-group">
									<label for="municipality">Municipio</label>
									<select name="municipality" id="municipality" class="form-control">
										@foreach($municipalities as $municipality)
											@if($municipality->id_municipio == $address->municipality)
												<option value="{{ $municipality->id_municipio }}" selected="selected">{{ $municipality->municipio }}</option>
											@else
												<option value="{{ $municipality->id_municipio }}">{{ $municipality->municipio }}</option>
											@endif
										@endforeach
									</select>
								</div>
			    			</div>
			    		</div>
			    		<div class="row">
			    			<div class="col-lg-6">
								<div id="field_parish" class="form-group">
									<label for="parish">Parroquia</label>
									<select name="parish" id="parish" class="form-control">
										@foreach($parishes as $parish)
											@if($parish->id_parroquia == $address->parish)
												<option value="{{ $parish->id_parroquia }}" selected="selected">{{ $parish->parroquia }}</option>
											@else
												<option value="{{ $parish->id_parroquia }}">{{ $parish->parroquia }}</option>
											@endif
										@endforeach
									</select>
								</div>
			    			</div>
			    			<div class="col-lg-6">{!!Field::text('sector',$address->sector,['label'=>'Sector de residencia'])!!}</div>
			    		</div>
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::text('street',$address->street,['label'=>'Calle/Avenida/Vereda'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('dwelling',$address->dwelling,['label'=>'Casa/Apartamento'])!!}</div>
			    		</div>
			    		<input type="hidden" id="person" name="person" value="{{ $person->id }}">
			    		<div class="row justify-content-center">
			    			<a id="cancelEditAddress" class="btn btn-danger text-white col-lg-5 mr-5">Cancelar</a>
			    			<a id="submintEditAddress" class="btn btn-primary text-white col-lg-5">Registrar direccion</a>
			    		</div>
			    	{!!Form::close()!!}
		    	</div>
		    </div>
		    <div id="_study" class="divList tile hidden">
		    	<div id="_contenEditStudy" class="row justify-content-center">
		    		<div class="col-md-11">
		        		<p><b>Grado de instruccion:</b> {{ insturction($study->instruction) }}</p>
			    		<p><b>Titulo:</b> {{ $study->grade }}</p>
			    		<p><b>Fecha de egreso:</b> {{ $study->egressDate }}</p>
		        	</div>
		    		<div class="col-md-1">
		    			<a href="" id="editStudy" class=""><i class="icon fa fa-edit fa-2x"></i></a>
		    		</div>
		    	</div>
		    	<div id="_formEditStudy" class="hidden">
		    		<div id="overlay" class="overlay">
			            <div class="m-loader mr-4">
			                <svg class="m-circular" viewBox="25 25 50 50">
			                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
			                </svg>
			            </div>
			            <h3 class="l-text">Enviando</h3>
		            </div>
		    		{!!Form::open(['class'=>'col-lg-12','id'=>'formEditStudy'])!!}
			    		<div class="row">
			    			<div class="col-lg-6">{!!Field::select('instruction',config('instruction'),$study->instruction,['label'=>'Grado de instruccion'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('grade',$study->grade,['label'=>'Titulo'])!!}</div>
			    			<div class="col-lg-6">{!!Field::text('egressDate',$study->egressDate,['label'=>'Fecha de egreso','class'=>'date'])!!}</div>
			    			<div class="col-lg-6">{!!Field::file('picture',['label'=>'Certificado'])!!}</div>
			    		</div>
			    		<input type="hidden" id="person" name="person" value="{{ $person->id }}">
			    		<div class="row justify-content-center">
			    			<a id="cancelEditStudy" class="btn btn-danger text-white col-lg-5 mr-5">Cancelar</a>
			    			<a id="submintEditStudy" class="btn btn-primary text-white col-lg-5">Registrar estudios</a>
			    		</div>
			    	{!!Form::close()!!}
		    	</div>
		    </div>
		    <div id="_training" class="divList tile hidden">
		    	<a href="" class="newTraining btn btn-sm btn-primary mb-1"><i class="icon fa fa-plus"></i> Curso</a>
		    	<table class="table">
		    		<thead>
		    			<tr>
		    				<th>#</th>
		    				<th>Tipo</th>
		    				<th>Descripcion</th>
		    				<th>Fecha de culminacion</th>
		    				<th>Horas</th>
		    				<th>Certificado</th>
		    				<th>Accion</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@foreach($formations as $key => $training)
		    				<tr>
		    					<td>{{ $key + 1 }}</td>
		    					<td>{{ training($training->type) }}</td>
		    					<td>{{ $training->description }}</td>
		    					<td>{{ $training->endingDate }}</td>
		    					<td>{{ $training->hours }}</td>
		    					<td>{{ ($training->picture == 'null')? 'SI':'NO' }}</td>
		    					<td>
		    						<a href="" class="editTraining" data-id="{{ $training->id }}"><i class="icon fa fa-edit"></i></a>
		    						<a href="" class="deleteTrainig text-danger" data-id="{{ $training->id }}"><i class="icon fa fa-trash"></i></a>
		    					</td>
		    				</tr>
		    			@endforeach
		    		</tbody>
		    	</table>
		    </div>
		    <div id="_family" class="divList tile hidden">
		    	<a href="" class="newFamily btn btn-sm btn-primary mb-1"><i class="icon fa fa-plus"></i> Familiar</a>
		    	<table class="table">
		    		<thead>
		    			<tr>
		    				<th>Cedula</th>
		    				<th>Nombres</th>
		    				<th>Edad</th>
		    				<th>Estado civil</th>
		    				<th>Parentesco</th>
		    				<th>Accion</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			@foreach($families as $family)
		    				<tr>
		    					<td>{{ $family->document }}</td>
		    					<td>{{ $family->firstName }}</td>
		    					<td>{{ age($family->birthdate) }}</td>
		    					<td>{{ ($family->civilStatus == 0)?'Femenino':'Masculino'  }}</td>
		    					<td>{{ kin($family->kin) }}</td>
		    					<td>
		    						<a href="" class="editFamili" data-id="{{ $family->id }}"><i class="icon fa fa-edit fa-2x"></i></a>
		    						<a href="" class="deleteFmaily text-danger" data-id="{{ $family->id }}"><i class="icon fa fa-trash fa-2x"></i></a>
		    					</td>
		    				</tr>
		    			@endforeach
		    		</tbody>
		    	</table>
		    </div>
	    </div>
	</div>

	<!-- Modal new training-->
	<div class="modal fade" id="modalNewTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar datos de Curso</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!!Form::open(['id'=>'FornNewTraining'])!!}
	    			{!!Field::select('type',['0'=>'Curso','1'=>'Diplomado'],['label'=>'Tipo de formacion'])!!}
	    			{!!Field::text('description',['label'=>'Descripcion'])!!}
	    			{!!Field::text('endingDate',['label'=>'Fecha de culminacion','class'=>'date'])!!}
	    			{!!Field::text('hours',['label'=>'Horas de estudio'])!!}
					<input type="hidden" name="person" id="person" value="{{ $person->id }}">
					<input type="hidden" name="id" id="id">
				{!!Form::close()!!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<a id="submintNewTraining" class="btn btn-primary text-white">Guardar cambios</a>
			</div>
	    </div>
	  </div>
	</div>

	<!-- Modal edit training-->
	<div class="modal fade" id="modalEditTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar datos de Curso</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!!Form::open(['url'=>'/formacion/update','id'=>'FornEditTraining'])!!}
	    			{!!Field::select('type',null,['label'=>'Tipo de formacion'])!!}
	    			{!!Field::text('description',['label'=>'Descripcion'])!!}
	    			{!!Field::text('endingDate',['label'=>'Fecha de culminacion','class'=>'date'])!!}
	    			{!!Field::text('hours',['label'=>'Horas de estudio'])!!}
					<input type="hidden" name="person" id="person">
					<input type="hidden" name="id" id="id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<a id="submintEditTraining" class="btn btn-primary">Guardar cambios</a>
			</div>
			{!!Form::close()!!}
	    </div>
	  </div>
	</div>

	<!-- Modal edit family-->
	<div class="modal fade" id="modalNewFamily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content ">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      	<div class="modal-body">
	        	{!!Form::open(['id'=>'formNewFamily'])!!}
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
				{!!Form::close()!!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<a id="submintNewFamily" class="btn btn-primary text-white">Guardar cambios</a>
			</div>
			
	    </div>
	  </div>
	</div>

	<!-- Modal edit family-->
	<div class="modal fade" id="modalEdtiFamily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content ">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      	<div class="modal-body">
	        	{!!Form::open(['id'=>'formEditFamily'])!!}
					<div class="row">
						<div class="col-lg-4">{!!Field::text('editDocument',['label'=>'Documento de identificacion','readOnly'=>'on'])!!}</div>
						<div class="col-lg-4">{!!Field::text('editFirstName',['label'=>'Nombres'])!!}</div>
				    	<div class="col-lg-4">{!!Field::text('editLastName',['label'=>'Apellidos'])!!}</div>
				    </div>

				    <div class="row">
		    			<div class="col-lg-3">{!!Field::text('editBirthdate',['label'=>'Fecha de nacimiento','class'=>'date'])!!}</div>
		    			<div class="col-lg-3">{!!Field::select('editGender',null,['label'=>'Genero'])!!}</div>
		    			<div class="col-lg-3">{!!Field::select('editCivilStatus',null,['label'=>'Estado civil'])!!}</div>
		    			<div class="col-lg-3">{!!Field::select('editKin',null,['label'=>'Parentesco'])!!}</div>
		    		</div>
		    		<input type="hidden" name="person" value="{{ $person->id }}">
				{!!Form::close()!!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<a id="submintEditFamily" class="btn btn-primary text-white">Guardar cambios</a>
			</div>
			
	    </div>
	  </div>
	</div>
@endsection