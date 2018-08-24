<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $table = 'payroll';

    protected $filable = [
    	'person',
		'workCondition',
		'code',
		'type',
		'position',
		'dependence',
		'departament',
		'salary',
		'dateOfAdmission',
		'dueDate',
		'status',
		'grade',
		'BankAccount',
		'bank'
    ];
}
