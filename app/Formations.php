<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formations extends Model
{
    protected $fillable = [
    	'person',
    	'type',
		'endingDate',
		'description',
		'hours',
		'picture'
    ];

    public function scopeFindPerson($query, $person)
    {
    	return $query->where('person', $person)->get();
    }
}
