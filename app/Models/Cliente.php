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
}
