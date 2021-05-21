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

    public function mostrarHijos($categorias, $cont){
                   
        $cont3 = $cont;
        foreach($categorias as $categoria){
            $cont2 = $cont;
            while($cont2>=0){
                echo "--";
                $cont2--;
            }
            echo ">";
            echo  "<a href='mostrarRecursosCategoria?id=" . $categoria->id . "'>" . $categoria->nombre . "</a><br>";
            if($categoria->hijas!=null){
                $this->mostrarHijos($categoria->hijas, $cont3+=2);
            }
            else{
                return;
            }
        }
    }

}