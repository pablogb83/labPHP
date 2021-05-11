<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Recurso;
use App\Models\RecursoModel;
use App\Models\AutorModel;
use App\Models\CategoriaModel;
use App\Models\RecursocategoriaModel;
use Config\Services;

class RecursoController extends BaseController
{
	protected $recursoModel;

	public function __construct()
	{
		$this->recursoModel = new RecursoModel($db);
	}
	
	public function index()
	{
		$categoriaModel = new CategoriaModel($db);
		$categorias= $categoriaModel->findAll();
		$categorias=array('categorias'=>$categorias);
		echo view('header');
		echo view('registrarRecurso', $categorias);
		echo view('footer');
	}

	public function guardar(){
		$request = Services::request();
		$recurso = new Recurso();
		$autorModel = new AutorModel();
		$recCatModel = new RecursocategoriaModel($db);
		$id = $request->getPost('id');
		$autor=$autorModel->where('id_usuario', $id)->first();
		$recurso->id_autor=$autor->id;
		$recurso->nombre = $request->getPost('nombre');
		$recurso->descripcion = $request->getPost('descripcion');
		$recurso->tipo = $request->getPost('tipo');
		$recurso->descargable = $request->getPost('descargable');

		$id_categoria = $request->getPost('Categoria');
		
		$file = $request->getFile('foto');
		$name=$file->getRandomName();
		$recurso->rutaImg = $name;
		$file->move('images', $name);

		
		$this->recursoModel->save($recurso);
		return redirect()->to(base_url());
		//echo $autor->nick_usuario;

		//echo 'estamos en guardar recurso';
	}
}
