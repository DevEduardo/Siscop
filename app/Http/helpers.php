<?php

function rol($rol){
	switch ($rol) {
		case '1':
			return 'Administrador';
			break;
		
		default:
			# code...
			break;
	}
}

function dateSql($date){
	$date1   = date_create($date);
    $dateSQl = date_format($date1, 'Y-m-d');
    return $dateSQl;
}

function gender($gender)
{
	switch ($gender) {
		case '0':
			return 'Femenino';
			break;
		case '1':
			return 'Masculino';
			break;
		
		default:
			# code...
			break;
	}
}

function civilStatus($civilStatus)
{
	switch ($civilStatus) {
		case '0':
			return 'Casado(a)';
			break;
		case '1':
			return 'Soltero(a)';
			break;
		case '2':
			return 'Divorciado(a)';
			break;
		case '3':
			return 'Viudo(a)';
			break;
		
		default:
			# code...
			break;
	}
}

function insturction($insturction){
	switch ($insturction) {
		case '0':
			return 'Bachiller';
			break;
		case '1':
			return 'Tecnico medio';
			break;
		case '2':
			return 'Tecnico superior universitario';
			break;
		case '3':
			return 'Licenciado';
			break;
		case '4':
			return 'Ingeniero';
			break;
		case '5':
			return 'Magister';
			break;
		case '6':
			return 'Doctorado';
			break;
		
		default:
			# code...
			break;
	}
}

function training($training)
{
	switch ($training) {
		case '0':
			return 'Curso';
			break;
		case '1':
			return 'Diplomado';
			break;
		
		default:
			# code...
			break;
	}
}

function kin($kin)
{
	switch ($kin) {
		case '0':
			return 'Esposo';
			break;
		case '1':
			return 'Esposa';
			break;
		case '2':
			return 'Hijo';
			break;
		case '3':
			return 'Hija';
			break;
		case '4':
			return 'Padre';
			break;
		case '5':
			return 'Madre';
			break;
		
		default:
			# code...
			break;
	}
}

function age($date)
{
	$age = Carbon\Carbon::parse($date)->age;
	return $age.' años';
}

function mil($num)
{
	$num = number_format($num, 2, ',', '.');

	return 'Bs '.$num;
}