<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Categoria;
use Config\Services;

class CategoriaController extends BaseController
{
	protected $categoria;

	public function __construct()
	{
		$this->categoria = new Categoria();
	}

	
	public function index()
	{
		$categorias=$this->categoria->get();
		$categorias = array('categorias'=>$categorias);
		echo view('headerAdmin');
		echo view('listaCategoriasAdmin', $categorias);
		echo view('footerAdmin');
	}

	public function nueva(){
		echo view('headerAdmin');
		echo view('nuevaCategoria');
		echo view('footerAdmin');
	}

	public function nuevaHija(){
		$request = Services::request();
		$id_padre= $request->getPostGet('id');
		$id_padre= array('id_padre'=>$id_padre);
		echo view('headerAdmin');
		echo view('nuevaCategoriaHija', $id_padre);
		echo view('footerAdmin');
	}

	public function mostrarRecursos(){
		$request = Services::request();
		$id= $request->getPostGet('id');
		$categoria = Categoria::find($id);
		$recursos = $categoria->recursos;
		$recursos= array('recursos'=>$recursos);
		echo view('header');
		echo view('mostrarRecursos', $recursos);
		echo view('footer');
	}

	public function guardar(){

		$request = Services::request();
		$this->categoria->nombre = $request->getPost('nombre');
		$file = $request->getFile('rutaFoto');
		$name=$file->getRandomName();
		$this->categoria->rutaImg = $name;
		$file->move('images', $name);
		$this->categoria->save();
		return redirect()->to(base_url().'/listaCategorias');

	}

	public function guardarHija(){
		$request = Services::request();
		$this->categoria->nombre = $request->getPost('nombre');
		$id_padre = $request->getPostGet('id_padre');
		$padre = Categoria::find($id_padre);
		
		$file = $request->getFile('rutaFoto');
		$name=$file->getRandomName();
		$this->categoria->rutaImg = $name;
		$file->move('images', $name);
		//$this->categoria->padre()->associate($padre);
		//$this->categoria->save();
		$padre->hijas()->save($this->categoria);
		return redirect()->to(base_url().'/listaCategorias');
	}

	public function borrar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$categoria = $this->categoria::find($id);
		$categoria->delete();
		return redirect()->to(base_url().'/listaCategorias');
	}

	public function editar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$categoria = $this->categoria->find($id);
		$categoria=array('categoria'=>$categoria);
		echo view('headerAdmin');
		echo view('editarCategoria', $categoria);
		echo view('footerAdmin');
	}

	public function actualizar(){
		$request = \Config\Services::request();
		$id = $request->getPost('id');
		$categoria = $this->categoria->find($id);
		$categoria->nombre = $request->getPost('nombre');
		$categoria->save();
		return redirect()->to(base_url().'/listaCategorias');
	}
}
