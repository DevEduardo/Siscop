@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
    	@if(@$newtabulador == 0)
			<div class="tile">
			<h3 class="text-primary text-center">Configuracion de tabulador salarial</h3>
			<div class="row">
				<div class="col-lg-12">
					<h4>Rgistrar valores</h4>	
				</div>
				{!!Form::open(['url'=>'tabulador','id'=>'formNewTabulador'])!!}
					<div class="row">
						<div class="col-lg-5">{!!Field::text('salary',['label'=>'Salario base'])!!}</div>
						
						<p class="porcentB text-primary col-lg-12"><b>Porcentaje bachilleres</b></p>
						<div class="porcentB col-lg-3">{!!Field::text('porcentB',['label'=>'B'])!!}</div>
						<div class="porcentB col-lg-3">{!!Field::text('porcentBI',['label'=>'BI'])!!}</div>
						<div class="porcentB col-lg-3">{!!Field::text('porcentBII',['label'=>'BII'])!!}</div>
						<div class="porcentB col-lg-3">{!!Field::text('porcentBIII',['label'=>'BIII'])!!}</div>

						<p class="porcentT text-primary col-lg-12"><b>Porcentaje tecnicos superio universitario</b></p>
						<div class="porcentT col-lg-4">{!!Field::text('porcentT',['label'=>'T'])!!}</div>
						<div class="porcentT col-lg-4">{!!Field::text('porcentTI',['label'=>'TI'])!!}</div>
						<div class="porcentT col-lg-4">{!!Field::text('porcentTII',['label'=>'TII'])!!}</div>

						<p class="porcentP text-primary col-lg-12"><b>Porcentaje profecionales universitarios</b></p>
						<div class="porcentP col-lg-3">{!!Field::text('porcentP',['label'=>'P'])!!}</div>
						<div class="porcentP col-lg-3">{!!Field::text('porcentPI',['label'=>'PI'])!!}</div>
						<div class="porcentP col-lg-3">{!!Field::text('porcentPII',['label'=>'PII'])!!}</div>
						<div class="porcentP col-lg-3">{!!Field::text('porcentPIII',['label'=>'PIII'])!!}</div>
						
						<div class="col-lg-12 text-center">
							<button type="submint" class="btn btn-secondary">Cancelar</button>
							<button id="submintNewTabulador" class="btn btn-success">Guardar cambios</button>
						</div>
					</div>
				{!!Form::close()!!}
			</div>
	    </div>				
		@else
		
	    <div class="tile">
			<h3 class="text-primary text-center">Configuracion de tabulador salarial</h3>
			<div class="row">
				<div class="col-lg-12">
					<h4>Valores actuales</h4>	
				</div>
				{!!Form::open()!!}
					<div class="row">
						<div class="col-lg-5">{!!Field::text('salary',mil($tabulador->salary),['label'=>'Salario base','readOnly'=>'on'])!!}</div>
						
						<p class="salaryB text-primary col-lg-12"><b>Salario bachilleres</b></p>
						<div class="salaryB col-lg-3">{!!Field::text('B',mil($tabulador->salaryB),['readOnly'=>'on'])!!}</div>
						<div class="salaryB col-lg-3">{!!Field::text('BI',mil($tabulador->salaryBI),['readOnly'=>'on'])!!}</div>
						<div class="salaryB col-lg-3">{!!Field::text('BII',mil($tabulador->salaryBII),['readOnly'=>'on'])!!}</div>
						<div class="salaryB col-lg-3">{!!Field::text('BIII',mil($tabulador->salaryBIII),['readOnly'=>'on'])!!}</div>
						
						<p class="porcentB hidden text-primary col-lg-12"><b>Porcentaje bachilleres</b></p>
						<div class="porcentB hidden col-lg-3">{!!Field::text('porcentB',$tabulador->porcentB,['label'=>'B %'])!!}</div>
						<div class="porcentB hidden col-lg-3">{!!Field::text('porcentBI',$tabulador->porcentBI,['label'=>'BI %'])!!}</div>
						<div class="porcentB hidden col-lg-3">{!!Field::text('porcentBII',$tabulador->porcentBII,['label'=>'BII %'])!!}</div>
						<div class="porcentB hidden col-lg-3">{!!Field::text('porcentBIII',$tabulador->porcentBIII,['label'=>'BIII %'])!!}</div>

						<p class="salaryT text-primary col-lg-12"><b>Salario tecnicos superio universitario</b></p>
						<div class="salaryT col-lg-4">{!!Field::text('T',mil($tabulador->salaryT),['readOnly'=>'on'])!!}</div>
						<div class="salaryT col-lg-4">{!!Field::text('TI',mil($tabulador->salaryTI),['readOnly'=>'on'])!!}</div>
						<div class="salaryT col-lg-4">{!!Field::text('TII',mil($tabulador->salaryTII),['readOnly'=>'on'])!!}</div>

						<p class="porcentT hidden text-primary col-lg-12"><b>Porcentaje tecnicos superio universitario</b></p>
						<div class="porcentT hidden col-lg-4">{!!Field::text('porcentT',$tabulador->porcentT,['label'=>'T %'])!!}</div>
						<div class="porcentT hidden col-lg-4">{!!Field::text('porcentTI',$tabulador->porcentTI,['label'=>'TI %'])!!}</div>
						<div class="porcentT hidden col-lg-4">{!!Field::text('porcentTII',$tabulador->porcentTII,['label'=>'TII %'])!!}</div>

						<p class="salaryP text-primary col-lg-12"><b>Salario profecionales universitarios</b></p>
						<div class="salaryP col-lg-3">{!!Field::text('P',mil($tabulador->salaryP),['readOnly'=>'on'])!!}</div>
						<div class="salaryP col-lg-3">{!!Field::text('PI',mil($tabulador->salaryPI),['readOnly'=>'on'])!!}</div>
						<div class="salaryP col-lg-3">{!!Field::text('PII',mil($tabulador->salaryPII),['readOnly'=>'on'])!!}</div>
						<div class="salaryP col-lg-3">{!!Field::text('PIII',mil($tabulador->salaryPIII),['readOnly'=>'on'])!!}</div>

						<p class="porcentP hidden text-primary col-lg-12"><b>Porcentaje profecionales universitarios</b></p>
						<div class="porcentP hidden col-lg-3">{!!Field::text('porcentP',$tabulador->porcentP,['label'=>'P %'])!!}</div>
						<div class="porcentP hidden col-lg-3">{!!Field::text('porcentPI',$tabulador->porcentPI,['label'=>'PI %'])!!}</div>
						<div class="porcentP hidden col-lg-3">{!!Field::text('porcentPII',$tabulador->porcentPII,['label'=>'PII %'])!!}</div>
						<div class="porcentP hidden col-lg-3">{!!Field::text('porcentPIII',$tabulador->porcentPIII,['label'=>'PIII %'])!!}</div>
						
						<div class="col-lg-12 text-center">
							<button id="editPorcent" class="btn btn-info">Modificar porcentajes</button>
							<button id="editSalary" class="btn btn-primary">Modificar salario base</button>
							<button id="save" class="btn btn-success hidden">Guardar cambios</button>
							<button id="cancelSave" class="btn btn-secondary hidden">Cancelar</button>
						</div>
					</div>
				{!!Form::close()!!}
			</div>
	    </div>
	    @endif
    </div>
</div>
@endsection