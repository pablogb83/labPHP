<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

	protected $table = 'clientes';

	public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class);
    }

    public function recursos()
    {
        return $this->belongsToMany(Recurso::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function listas()
    {
        return $this->hasMany(Lista::class);
    }
    /*
    public function suscripcion()
    {
        return $this->belongsTo(Suscripcion::class);
    }
    */
}
