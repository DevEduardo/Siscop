<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parishes extends Model
{
    protected $table = 'parroquias';
    protected $fillable = ['id_municipio', 'parroquia'];

    public function scopeGetParish($query, $id)
    {
    	return $query->where('id_municipio', $id)->get();
    }
}
