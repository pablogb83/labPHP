<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Recurso;
use App\Models\Autor;
use App\Models\Usuario;
use App\Models\Categoria;
use Config\Services;
use Exception;

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
			'foto' => "ext_in[foto,png,jpg,jpeg]",
			'archivo' => "ext_in[archivo,pdf,mp3,mp4,m4a]"
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
			],
			'foto' => [
				'ext_in' => 'Extencion de imagen invalida, solo puede ser png, jpg o jpeg'
			],
			'archivo' => [
				'ext_in' => 'Extencion de archivo invalida, solo puede ser pdf,mp3,mp4,m4a'
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

			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
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

		try{
			$request = Services::request();
			$id = $request->getPostGet('id');
			$rec = Recurso::find($id);

			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}

			$autor = Autor::find($rec->autor_id);
			$usuario = $autor->usuario;

			if( !(isset($_SESSION['datos_usuario']['id']) and $_SESSION['datos_usuario']['id'] == $usuario->id)){
				$rec->visitas++;
				$rec->save();
			}		
			
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

		}catch(Exception $e){
			
			echo view('header');
			echo view('errors/html/error_404');
			echo view('footer');

		}
		

	}

	public function contarDescargas(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$rec = Recurso::find($id);
		$rec->descargas++;
		$rec->save();
		//echo 'estoy aca ' . $rec->nombre;
	}

}
