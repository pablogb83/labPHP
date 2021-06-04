<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

	protected $table = 'comentarios';

	public function recurso()
    {
        return $this->belongsTo(Recurso::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
