<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipalities extends Model
{
    protected $table = 'municipios';
    protected $fillable = ['id_estado', 'municipio'];

    public function scopeGetMunicipality($query, $id)
    {
    	return $query->where('id_estado', $id)->get();
    }
}
