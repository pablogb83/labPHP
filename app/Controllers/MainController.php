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
		$categorias = $categoriaModel->take(5)->get();
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
}
