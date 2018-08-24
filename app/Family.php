<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
    	'person',
    	'noDocument',
    	'nationality',
		'document',
		'birthCertificate',
		'firstName',
		'lastName',
		'gender',
		'birthdate',
		'kin',
		'civilStatus'
    ]; 

    public function scopeFamilyNoDocument($query)
    {
    	return $query->where('noDocument',1)->count();
    }

    public function scopeFindPerson($query,$person)
    {
        return $query->where('person', $person)->get();
    }
}
