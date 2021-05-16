<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	protected $table = 'categorias';

	public function recursos()
    {
        return $this->belongsToMany(Recurso::class);
    }

}