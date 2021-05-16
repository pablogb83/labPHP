<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Recurso extends Model
{
	
	protected $table = 'recursos';

	public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

	public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

}
