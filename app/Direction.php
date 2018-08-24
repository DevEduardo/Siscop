<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable= [
    	'person',
    	'country',
		'city',
		'estate',
		'municipality',
		'parish',
		'sector',
		'street',
		'dwelling'
    ];

    public function scopeFindPerson($query,$person)
    {
    	return $query->where('person', $person)->first();
    }

}
