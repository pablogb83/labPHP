<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

	protected $table = 'usuarios';

	public function autor()
    {
        return $this->hasOne(Autor::class);
    }

	public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
}
