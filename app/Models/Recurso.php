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

	public function clientes()
    {
        return $this->belongsToMany(Cliente::class);
    }

	public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

	public function listas()
    {
        return $this->belongsToMany(Lista::class);
    }

    public function guardarCategoria($recurso, $categoria){
		if($categoria->categoria_id==0){
			return;
		}
		$padre_divorciado=$categoria->padre;
		if($recurso->categorias()->find($padre_divorciado->id)==null){
			$recurso->categorias()->save($padre_divorciado);
			return $this->guardarCategoria($recurso, $padre_divorciado);
		}
	}

    public static function chequeaComentario($id_cliente, $id_recurso){
		$comentarios = Recurso::find($id_recurso)->comentarios;
		$comento = false;
        foreach($comentarios as $comentario){
			if($comentario->cliente_id == $id_cliente){
				$comento = true;
			}
		}
        return $comento;
	}

}
