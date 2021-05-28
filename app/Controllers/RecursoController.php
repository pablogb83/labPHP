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

		if (! $this->validate([
			'nombre' => "required|is_unique[recursos.nombre]",
			'descripcion' => "required",
			'tipo' => "required",
			'Categoria' => "required",
		],[   
			'nombre' => [
				'required' => 'Debes ingresar un nombre para el recurso',
				'is_unique' => 'Ya existe un recurso con ese nombre'
			],
			'descripcion' => [
				'required' => 'Debes ingresar una descripcion para el recurso',
			],
			'Categoria' => [
				'required' => 'Por favor selecciona al menos una categoria',
			]
		]))
		{	
			$categorias= Categoria::get();
			$categorias=array('categorias'=>$categorias);
			echo view('header');
			echo view('_errors_list', [
				'errors' => $this->validator->getErrors()
			]);
			echo view('registrarRecurso', $categorias);
			echo view('footer');
		}else{

			session_start();
			$autor=Usuario::find($_SESSION['datos_usuario']['id'])->autor;
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

			return redirect()->to(base_url());

		}
	}

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
