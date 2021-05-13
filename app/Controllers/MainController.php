<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\RecursosModel;
use App\Models\AutorModel;
use App\Models\ClienteModel;
use App\Models\RecursoModel;
use App\Models\UsuarioModel;

class MainController extends BaseController
{
	public function index()
	{
		$categoriaModel = new CategoriaModel($db);
		$recursosModel = new RecursoModel($db);
		$recursos = $recursosModel->orderBy('created_at','desc')->findAll(3);
		$categorias = $categoriaModel->findAll(5);
		$datos['categorias'] = $categorias;
		$datos['recursos'] = $recursos;
		//$categorias = array('categorias'=>$categorias);
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
		/*
		echo view('headerAdmin');
		echo view('adminPage');
		echo view('footerAdmin');
		*/
	}

	public function seleccionarPerfil(){
		echo view('header');
		switch($_SESSION['datos_usuario']['tipo']){
			case 'indefinido':
				echo view('selecPerfil');
				echo view('footer');
				break;
			case 'autor':
				$autorModel = new AutorModel($db);
				$usuarioModel = new UsuarioModel($db);
				$usuario = $usuarioModel->find($_SESSION['datos_usuario']['id']);
				$autor=$autorModel->where('id_usuario', $_SESSION['datos_usuario']['id'])->first();
				$datos['autor'] = $autor;
				$datos['usuario'] = $usuario;
				echo view('paginaAutor', $datos);
				echo view('footer');
				break;
			case 'cliente':
				$clienteModel = new ClienteModel($db);
				$usuarioModel = new UsuarioModel($db);
				$usuario = $usuarioModel->find($_SESSION['datos_usuario']['id']);
				$cliente=$clienteModel->where('id_usuario', $_SESSION['datos_usuario']['id'])->first();
				$datos['cliente'] = $cliente;
				$datos['usuario'] = $usuario;
				echo view('paginaCliente', $datos);
				echo view('footer');
				break;
		}

		
	}

}
