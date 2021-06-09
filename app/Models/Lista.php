<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Lista extends Model
{
	
	protected $table = 'listas';

	public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function recursos()
    {
        return $this->belongsToMany(Recurso::class);
    }

}
