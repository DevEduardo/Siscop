<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
    	'nacionality',
		'document',
		'firstName',
		'lastName',
		'birthdate',
		'gender',
		'phone',
		'telephone',
		'email',
		'picture',
		'civilStatus',
		'status'
    ];

    public function scopeFindDocument($query, $document)
    {
    	return $query->where('document', $document)->first();
    }

    public function scopeWithoutContract($query)
    {
    	return $query->where('status', 0)->get();
    }
}
