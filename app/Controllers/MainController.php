<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Categoria;
use App\Models\Recurso;
use App\Models\Usuario;
use Config\Services;

class MainController extends BaseController
{
	public function index()
	{
		$categoriaModel = new Categoria();
		$recursosModel = new Recurso();
		$recursos = $recursosModel->orderBy('created_at','desc')->take(3)->get();
		$categorias = $categoriaModel->get();
		$datos['categorias'] = $categorias;
		$datos['recursos'] = $recursos;
		echo view('header');
		echo view('paginainicio', $datos);
		echo view('footer');
	}

	public function loginPage()
	{
		echo view('header');
		echo view('login');
		echo view('footer');
	}

	public function registerPage()
	{
		echo view('header');
		echo view('register');
		echo view('footer');
	}

	public function adminPage(){
		
		echo view('loginAdmin');

	}

	public function seleccionarPerfil(){
		
		echo view('header');
		echo view('selecPerfil');
		echo view('footer');
	}

	public function perfil(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuarioModel = new Usuario();
		$usuaurio = $usuarioModel->find($id);
		switch ($usuaurio->tipo){
			case 'autor':
				return redirect()->to(base_url().'/paginaAutor?id='. $id);
				break;
			case 'cliente':
				return redirect()->to(base_url().'/paginaCliente?id='. $id);
				break;
		}
	}

	public function buscador(){
		$request = Services::request();
		$busqueda = $request->getPostGet('busqueda');
		$recursos = Recurso::where('nombre', 'like', '%'.$busqueda.'%')->orderBy('created_at')->get();
		$recursos= array('recursos'=>$recursos);
		//var_dump($recursos);
		echo view('header');
		echo view('mostrarRecursos', $recursos);
		echo view('footer');
		//echo $busqueda;
	}

	public function mostrarPorTipo(){
		$request = Services::request();
		$busqueda = $request->getPostGet('tipo');
		if($busqueda=='Todos'){
			$recursos = Recurso::orderBy('created_at')->get();
		}else{
			$recursos = Recurso::where('tipo', $busqueda)->orderBy('created_at')->get();
		}
		
		$recursos= array('recursos'=>$recursos);
		//var_dump($recursos);
		echo view('header');
		echo view('mostrarRecursos', $recursos);
		echo view('footer');
	}

	public function checkSuscrip(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$request = Services::request();
		$id = $request->getPostGet('id');
		$cliente = Usuario::find($_SESSION['datos_usuario']['id'])->cliente;
		if($cliente->suscripto == 1){
			return redirect()->to(base_url().'/paginaRecurso?id='. $id);
		}else{
			return redirect()->to(base_url().'/suscribirse?id=' . $_SESSION['datos_usuario']['id']);	
		}
		//echo $cliente->nombre;
	}

	public function mostrarAutores(){
		
		$usuarios = Usuario::where('tipo', 'autor')->get();
		$usuarios= array('usuarios'=>$usuarios);
		echo view('header');
		echo view('mostrarAutores', $usuarios);
		echo view('footer');
	}
}
