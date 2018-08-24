@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
	    <div class="tile">
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
</div>
@endsection