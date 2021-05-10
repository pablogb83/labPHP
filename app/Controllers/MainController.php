<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class MainController extends BaseController
{
	public function index()
	{
		$categoriaModel = new CategoriaModel($db);
		$categorias = $categoriaModel->findAll();
		$categorias = array('categorias'=>$categorias);
		echo view('header');
		echo view('paginainicio', $categorias);
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
		if($_SESSION['datos_usuario']['tipo']=='indefinido'){
			
			echo view('selecPerfil');
			echo view('footer');
		}else{
			echo 'ya tienes un perfil definido';
		}
		
	}

}
