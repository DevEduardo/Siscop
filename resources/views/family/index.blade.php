@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
	    <div class="tile">
			{!!Form::open(['url'=>'familiares/create'])!!}
				{!!Field::select('person',$people,['label'=>'Buscar..'])!!}
				<div class="row justify-content-center">
					<button type="submint" class="btn btn-primary">Buscar</button>
				</div>
			{!!Form::close()!!}
	    </div>
    </div>
</div>
@endsection