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
		
		$autor->recursos()->save($this->recurso);


		$id_categoria = $request->getPost('Categoria');
		//$categoria = Categoria::find($id_categoria);
		//$this->recurso->categorias()->save($categoria);
		foreach ($id_categoria as $id){
			$categoria = Categoria::find($id);
			$this->recurso->categorias()->save($categoria);
		}

		
		return redirect()->to(base_url());

		
		//echo $autor->nick_usuario;

		//echo 'estamos en guardar recurso';
	}

	public function mostrar(){

			$request = Services::request();
			$id = $request->getPostGet('id');
			$rec = Recurso::find($id);
			$autor = Recurso::find($id)->autor;
			$usuario = Autor::find($autor->id)->usuario;
			$datos['autor'] = $autor;
			$datos['usuario'] = $usuario;
			$datos['recurso'] = $rec;
			echo view('header');
			echo view('paginaRecurso', $datos);
			echo view('footer');

	}
}
