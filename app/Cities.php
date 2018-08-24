<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'ciudades';
    protected $fillable = ['id_estado', 'ciudad'];

    public function scopeGetCity($query, $id)
    {
    	return $query->where('id_estado', $id)->get();
    }
}
