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

    public function masDescargados(){
        //return Recurso::where('autor_id', $autor_id)->orderBy('descargas', 'DESC')->get();
        return $this->recursos()->orderBy('descargas', 'DESC')->take(5)->get();
    }

    public function masVistos(){
        //return Recurso::where('autor_id', $autor_id)->orderBy('descargas', 'DESC')->get();
        return $this->recursos()->orderBy('visitas', 'DESC')->take(5)->get();
    }

    public function cantRecPublic(){
        //return Recurso::where('autor_id', $autor_id)->orderBy('descargas', 'DESC')->get();
        return $this->recursos()->count();
    }

}
