<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Recurso;
use App\Models\Autor;
use App\Models\Usuario;
use App\Models\Categoria;
use Config\Services;

class RecursoController extends BaseController
{
	protected $recurso;

	public function __construct()
	{
		$this->recurso = new Recurso();
	}
	
	public function index()
	{
		$categorias= Categoria::get();
		$categorias=array('categorias'=>$categorias);
		echo view('header');
		echo view('registrarRecurso', $categorias);
		echo view('footer');
	}

	public function guardar(){
		$request = Services::request();
		session_start();
		$autor=Usuario::find($_SESSION['datos_usuario']['id'])->autor;
		//$this->recurso->id_autor=$autor->id;
		$this->recurso->nombre = $request->getPost('nombre');
		$this->recurso->descripcion = $request->getPost('descripcion');
		$this->recurso->tipo = $request->getPost('tipo');
		$this->recurso->descargable = $request->getPost('descargable');
		$this->recurso->suscripcion = $request->getPost('suscripcion');
		
		$file = $request->getFile('foto');
		$name=$file->getRandomName();
		$this->recurso->rutaImg = $name;
		$file->move('images', $name);

		$file = $request->getFile('archivo');
		$name=$file->getRandomName();
		$this->recurso->rutaArch = $name;
		$file->move('archivos', $name);
		
		$autor->recursos()->save($this->recurso);


		$id_categoria = $request->getPost('Categoria');

		$this->recurso->categorias()->attach($id_categoria);
		//$categoria = Categoria::find($id_categoria);
		//$this->recurso->categorias()->save($categoria);
		/*
		foreach ($id_categoria as $id){
			$categoria = Categoria::find($id);
			$this->recurso->categorias()->save($categoria);
			$this->recurso->guardarCategoria($this->recurso, $categoria);
			/*$this->recurso->categorias()->save($categoria);
			if($categoria->categoria_id!=0){
				$padre_divorciado=$categoria->padre;
				if($this->recurso->categorias()->find($padre_divorciado->id)==null){
					$this->recurso->categorias()->save($padre_divorciado);
				}
			}
		}*/


		
		return redirect()->to(base_url());

		
		//echo $autor->nick_usuario;

		//echo 'estamos en guardar recurso';
	}

	/*public function guardarCategoria($recurso, $categoria){
		if($categoria->categoria_id==0){
			return;
		}
		$padre_divorciado=$categoria->padre;
		if($recurso->categorias()->find($padre_divorciado->id)==null){
			$recurso->categorias()->save($padre_divorciado);
			return $this->guardarCategoria($recurso, $padre_divorciado);
		}
		
	}*/

	public function mostrar(){

		$request = Services::request();
		$id = $request->getPostGet('id');
		$rec = Recurso::find($id);
		$autor = Recurso::find($id)->autor;
		$usuario = Autor::find($autor->id)->usuario;
		$categorias = $rec->categorias;
		$comentarios = $rec->comentarios;
		$datos['autor'] = $autor;
		$datos['usuario'] = $usuario;
		$datos['recurso'] = $rec;
		$datos['categorias'] = $categorias;
		$datos['comentarios'] = $comentarios;
		echo view('header');
		echo view('paginaRecurso', $datos);
		echo view('footer');

	}

}
