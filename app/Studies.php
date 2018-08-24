<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studies extends Model
{
    protected $fillable = [
    	'person',
    	'instruction',
		'grade',
		'egressDate',
		'picture'
    ]; 

    public function scopeFindPerson($query, $person)
    {
    	return $query->where('person', $person)->first();
    }
}
