<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuario;
use App\Models\Lista;
use App\Models\Recurso;
use CodeIgniter\HTTP\Request;
use Config\Services;
use phpDocumentor\Reflection\Types\This;

class ListaController extends BaseController
{
	protected $lista;

	public function __construct()
	{
		$this->lista = new Lista();
	}

	
	public function index()
	{

	}

	public function guardar(){
		
		$request = Services::request();

		if (! $this->validate([
			'nombre' => "required",
			'tipo' => "required"
		],[   
			'nombre' => [
				'required' => 'Debes ingresar un nombre para la lista'
			],
			'tipo' => [
				'required' => 'Debes seleccionar un tipo',
			]
		]))
		{	
			echo view('header');
			echo view('_errors_list', [
				'errors' => $this->validator->getErrors()
			]);
			echo view('footer');
		}else{
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			$cliente=Usuario::find($_SESSION['datos_usuario']['id'])->cliente;
			$this->lista->cliente_id = $cliente->id;
			$this->lista->nombre = $request->getPost('nombre');
			$this->lista->tipo = $request->getPost('tipo');

			$recursos_id = $request->getPost('recursos');

			$cliente->listas()->save($this->lista);
			$this->lista->recursos()->attach($recursos_id);
			return redirect()->to(base_url().'/paginaCliente?id='. $_SESSION['datos_usuario']['id']);
		}
	}

	public function agregarRecurso(){
		$request = Services::request();
		$this->lista = Lista::find($request->getPostGet('lista'));
		$recurso = Recurso::find($request->getPostGet('id'));
		$this->lista->recursos()->syncWithoutDetaching($recurso->id);
		return redirect()->to(base_url().'/paginaRecurso?id='. $recurso->id);
	}

	public function mostarRecursosLista(){
		$request = Services::request();
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$id = $request->getPostGet('id');
		$this->lista = Lista::find($id);
		$cliente = $this->lista->cliente;
		$usuario = $cliente->usuario;
		$recursos = $this->lista->recursos;
		$respuesta='';
		if($usuario->id == $_SESSION['datos_usuario']['id']){
			foreach($recursos as $recurso){
			
				$respuesta= $respuesta . '<tr><td><a href="paginaRecurso?id=' . $recurso->id .'">' . $recurso->nombre . '</a></td> <td> <a href="quitarRecursoLista?id=' . $recurso->id .'&idlista=' . $id . '"><i class="fas fa-eraser"></i></a>  </td> </tr>';
			}
		}else{
			if($this->lista->tipo == 1 ){
				foreach($recursos as $recurso){
			
					$respuesta= $respuesta . '<tr><td><a href="paginaRecurso?id=' . $recurso->id .'">' . $recurso->nombre . '</a></td> <td> <a href="quitarRecursoLista?id=' . $recurso->id .'&idlista=' . $id . '"><i class="fas fa-eraser"></i></a>  </td> </tr>';
				}
			}else{
				$respuesta = 'Esta es una lista privada';
			}
		}
		echo json_encode($respuesta);
	}

	public function quitarRecursoLista(){
		$request = Services::request();
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$request = Services::request();
		$id = $request->getPostGet('idlista');
		$idRec =  $request->getPostGet('id');
		$this->lista = Lista::find($id);
		$this->lista->recursos()->detach($idRec);
		return redirect()->to(base_url().'/paginaCliente?id='. $_SESSION['datos_usuario']['id']);
	}
}
