<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Recurso;
use App\Models\Autor;
use App\Models\Usuario;
use App\Models\Comentario;
use Config\Services;


class ComentarioController extends BaseController
{
	protected $comentario;

	public function __construct()
	{
		$this->comentario = new Comentario();
	}

	public function index()
	{
	}

	public function guardar()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$request = Services::request();
		$id = $request->getPostGet('id');
		$rec = Recurso::find($id);

		if (! $this->validate([
			'nota' => "required|greater_than[0]|less_than[6]",
			'comentario' => "required",
		],[   
			'nota' => [
				'required' => 'Debes ingresar un numero entre 1 y 5',
				'greater_than' => 'La nota debe ser mayor o igual que 0',
				'less_than' => 'La nota debe ser menor o igual a 5'
			],
			'comentario' => [
				'required' => 'El comentario no puede ser vacio',
			]
		]))
		{	
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
			echo view('_errors_list', [
				'errors' => $this->validator->getErrors()
			]);
			echo view('paginaRecurso', $datos);
			echo view('footer');
		}else{
			$nota = $request->getPostGet('nota');
			$usuario = Usuario::find($_SESSION['datos_usuario']['id']);
			$cliente = $usuario->cliente;
			$this->comentario->cliente_id = $cliente->id;
			$this->comentario->recurso_id = $request->getPostGet('id');
			$this->comentario->nota = $request->getPostGet('nota');
			$this->comentario->texto = $request->getPostGet('comentario');
			$this->comentario->save();
			$totalcalif = $rec->comentarios->count();
			$suma = 0;
			foreach($rec->comentarios as $comentario){
				$suma += $comentario->nota; 
			}
			//$nuevaNota = ($rec->nota + $nota) / $totalcalif;
			$nuevaNota = $suma / $totalcalif;
			$rec->nota = $nuevaNota;
			$rec->save();
			/*echo 'este recurso tiene: ' . $totalcalif . ' calificaciones <br>';
			echo 'la nota actual es ' . $rec->nota . '<br>';
			echo 'el nombre del recuros es ' . $rec->nombre . '<br>';
			echo 'el usuario califico con ' . $nota . '<br>';
			echo 'y la nueva nota sera de ' . $nuevaNota . '<br>';*/
			
			return redirect()->to(base_url() . '/paginaRecurso?id=' . $id);

		}

	}


}
