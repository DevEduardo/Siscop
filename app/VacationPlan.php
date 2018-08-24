<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationPlan extends Model
{
    protected $table = 'vacationPlan';
    protected $fillable = [
    	'startDate',
		'endingDate',
		'minimumAge',
		'maximumAge',
		'startDatePlan',
		'endingDatePlan'
    ];
}
