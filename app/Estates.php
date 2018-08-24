<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estates extends Model
{
    protected $table = 'estados';
    protected $fillable = ['id_estado', 'estado'];

    public function scopeGetEstate($query, $id)
    {
    	return $query->where('id_estado', $id)->get();
    }
}
