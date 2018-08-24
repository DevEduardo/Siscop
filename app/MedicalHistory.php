<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $fillable = [
    	'person',
    	'disease',
		'treatment',
		'operations',
		'inability'
    ];
}
