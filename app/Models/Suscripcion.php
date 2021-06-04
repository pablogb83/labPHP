<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    //no se usa todavia, no se si vale la pena 
	protected $table = 'suscripcion';

	public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

}
