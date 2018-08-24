<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variables extends Model
{
    protected $table = 'variables';
    protected $fillable = [
    	'codeEF',
    	'codeEC',
    	'codeOF',
    	'codeOC'
    ];

    public function scopeCode($query)
    {
    	return $query->select('codeEF','codeEC','codeOF','codeOC')->first();
    }
}
