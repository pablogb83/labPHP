<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

	protected $table = 'autor';

	public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function recursos()
    {
        return $this->hasMany(Recurso::class);
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class);
    }

}
