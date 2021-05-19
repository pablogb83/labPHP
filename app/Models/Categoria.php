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

    public function padre(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function hijas(){
        return $this->hasMany(Categoria::class, 'categoria_id');
    }

}